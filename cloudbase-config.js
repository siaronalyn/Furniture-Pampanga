// CloudBase configuration
// TODO: Palitan ang `env` value ng actual CloudBase environment ID mo.
// Makikita ito sa CloudBase console, usually parang "xxxx-yyy".

window.CLOUDBASE_CONFIG = {
    // Required: CloudBase environment ID
    env: "your-env-id-here",

    // Optional: region, kung alam mo (hal. "ap-shanghai" or "ap-guangzhou")
    // Pwede mong iwan blank kung isang region lang ginagamit mo sa account.
    region: "",

    // Optional: pangalan ng collection at document kung saan ise-save
    // ang lahat ng image/config data na galing sa localStorage.
    collection: "siteData",
    documentId: "sharedImageData"
};

