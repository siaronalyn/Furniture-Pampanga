(function () {
    var PREFIX = 'furniturePampanga';
    var STORAGE_READY_EVENT = 'furniturePampangaStorageReady';

    function setReady() {
        window.__storageReady = true;
        try {
            window.dispatchEvent(new Event(STORAGE_READY_EVENT));
        } catch (e) {
            var ev = document.createEvent('Event');
            ev.initEvent(STORAGE_READY_EVENT, true, true);
            window.dispatchEvent(ev);
        }
    }

    function runWhenStorageReady(callback) {
        if (window.__storageReady) { callback(); return; }
        window.addEventListener(STORAGE_READY_EVENT, function once() {
            window.removeEventListener(STORAGE_READY_EVENT, once);
            callback();
        });
    }

    function applyToLocalStorage(data) {
        if (!data || typeof data !== 'object') return;
        try {
            Object.keys(data).forEach(function (key) {
                if (key.indexOf(PREFIX) === 0) localStorage.setItem(key, data[key]);
            });
        } catch (e) {}
    }

    function getAllLocalData() {
        var out = {};
        try {
            for (var i = 0; i < localStorage.length; i++) {
                var key = localStorage.key(i);
                if (key && key.indexOf(PREFIX) === 0) out[key] = localStorage.getItem(key);
            }
        } catch (e) {}
        return out;
    }

    // Save all furniturePampanga keys to server
    function syncToServer() {
        var data = getAllLocalData();
        return fetch('/save-data', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        }).then(function (r) { return r.ok; }).catch(function () { return false; });
    }

    // Legacy Firebase stub (no-op if no config)
    function syncToFirebase() { return syncToServer(); }

    window.runWhenStorageReady = runWhenStorageReady;
    window.syncToFirebase = syncToFirebase;
    window.syncToServer = syncToServer;
    window.__storageReady = false;

    // Load data from server, apply to localStorage, then fire ready
    fetch('/site-data?_=' + Date.now())
        .then(function (r) { return r.json(); })
        .then(function (data) {
            applyToLocalStorage(data);
            setReady();
        })
        .catch(function () {
            setReady(); // fallback: use whatever is already in localStorage
        });
})();
