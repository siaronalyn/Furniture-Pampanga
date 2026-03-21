# Paano i-setup ang Firebase para shared images (makikita sa lahat ng browser)

1. **Gawa ng Firebase project**
   - Pumunta sa https://console.firebase.google.com
   - Click **Create a project** (o piliin ang existing project)
   - Sundin ang steps hanggang ma-create

2. **I-enable ang Realtime Database**
   - Sa left sidebar: **Build** → **Realtime Database**
   - Click **Create Database**
   - Piliin location (e.g. `asia-southeast1`), next
   - **Start in test mode** (para gumana agad read/write). Click **Enable**
   - Copy ang **Database URL** (hal. `https://YOUR-PROJECT-id.firebaseio.com`)

3. **Kunin ang Web app config**
   - Sa project overview: click ang **</>** (Web) icon para mag-add ng app
   - Ilagay ang app nickname, wag i-check ang Firebase Hosting, **Register app**
   - Copy ang `firebaseConfig` object (apiKey, authDomain, databaseURL, projectId, storageBucket, messagingSenderId, appId)
   - Click **Continue to console**

4. **Ilagay sa website**
   - Buksan ang file **firebase-config.js** sa folder ng website
   - Palitan ang `window.FIREBASE_CONFIG = { ... }` ng config na na-copy mo. Siguraduhing may **databaseURL** (yung Database URL sa step 2).

5. **Tapos**
   - Pag nag-Save ka sa Admin page, awtomatikong ma-sync sa Firebase. Kapag binuksan ang site sa ibang browser o phone, makikita rin ang images.

**Security (optional):** Sa Realtime Database → **Rules**, pwedeng i-restrict later. Para sa testing, ok muna ang test mode.
