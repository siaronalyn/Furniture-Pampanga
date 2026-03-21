# Paano i-Setup ang Firebase (Step-by-Step)

Para gumana ang image sync sa lahat ng device, kailangan punan ang **firebase-config.js** gamit ang config mula sa Firebase Console.

---

## Step 1: Pumunta sa Firebase Console

1. Buksan ang browser at pumunta sa: **https://console.firebase.google.com**
2. Sign in gamit ang Google account mo.

---

## Step 2: Gumawa ng Bagong Project (o piliin ang existing)

1. Click **"Create a project"** (o kung may project ka na, piliin iyon).
2. Ilagay ang **Project name** (hal. `furniture-pampanga`).
3. Sundin ang mga tanong (Google Analytics optional — pwede i-skip).
4. Click **"Create project"** at hintayin matapos.

---

## Step 3: I-enable ang Realtime Database

1. Sa **kaliwang sidebar**, click **"Build"** → **"Realtime Database"**.
2. Click **"Create Database"**.
3. Piliin ang **location** (recommended: `asia-southeast1` para sa Philippines).
4. Sa **Security rules**, piliin **"Start in test mode"** (para gumana agad).
5. Click **"Enable"**.
6. **Important:** Copy ang **Database URL** na lalabas sa taas (hal. `https://furniture-pampanga-xxxxx.firebaseio.com`). Ito ang ilalagay sa **databaseURL** sa firebase-config.js.

---

## Step 4: Kunin ang Web App Config

1. Sa **Project Overview** (home ng project), click ang **icon na `</>`** (Web / Add app).
2. Ilagay ang **App nickname** (hal. "Furniture Pampanga Website"). Huwag i-check ang Firebase Hosting.
3. Click **"Register app"**.
4. Lalabas ang **firebaseConfig** na parang ganito:

```javascript
const firebaseConfig = {
  apiKey: "AIza...",
  authDomain: "furniture-pampanga-xxxxx.firebaseio.com",
  databaseURL: "https://furniture-pampanga-xxxxx.firebaseio.com",
  projectId: "furniture-pampanga-xxxxx",
  storageBucket: "furniture-pampanga-xxxxx.appspot.com",
  messagingSenderId: "123456789",
  appId: "1:123456789:web:abcdef"
};
```

5. **Copy** ang buong object na yan (o isulat bawat value).
6. Click **"Continue to console"**.

---

## Step 5: Ilagay sa firebase-config.js

1. Buksan ang file **firebase-config.js** sa folder ng website (same folder ng index.html).
2. Palitan ang mga empty string `""` ng values na na-copy mo. Dapat ganito ang itsura:

```javascript
window.FIREBASE_CONFIG = {
    apiKey: "AIza...",                    // mula sa firebaseConfig
    authDomain: "furniture-pampanga-xxxxx.firebaseio.com",
    databaseURL: "https://furniture-pampanga-xxxxx.firebaseio.com",  // REQUIRED
    projectId: "furniture-pampanga-xxxxx",
    storageBucket: "furniture-pampanga-xxxxx.appspot.com",
    messagingSenderId: "123456789",
    appId: "1:123456789:web:abcdef"
};
```

3. **Siguraduhin** na may laman ang **databaseURL** (yung Realtime Database URL sa Step 3).
4. **I-save** ang file.

---

## Step 6: Test

1. Buksan ang **Admin** page ng site (e.g. `admin.html`).
2. Maglagay ng image URL (dapat **https://** …) at click **Save**.
3. Buksan ang site sa **ibang device o browser** (o incognito). Dapat makita pa rin ang image — ibig sabihin naka-sync na sa Firebase.

---

## Madalas na problema

| Problema | Solusyon |
|----------|----------|
| Walang lumalabas na images sa ibang device | Tiyaking na-save ang config sa **firebase-config.js** at may **databaseURL**. Pagkatapos mag-Save sa Admin, i-refresh ang ibang device. |
| Error sa console tungkol sa Firebase | Tiyaking tama ang spelling ng bawat key (apiKey, authDomain, databaseURL, projectId, storageBucket, messagingSenderId, appId). |
| "Permission denied" sa Realtime Database | Sa Firebase Console → Realtime Database → **Rules**, gamitin muna **test mode** (read/write true para sa testing). |

Kapag tapos na ang setup, ang bawat **Save** sa Admin ay magse-sync sa Firebase at makikita ang data (images, URLs) sa kahit anong device na magbukas ng site.
