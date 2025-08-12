## Introduction

In this tutorial, we’ll walk through how to create a **global configuration for DMS folder uploads**.

This configuration will be used in nodes that need to **store or retrieve files** from the **Data Vault** — making it easy to manage document storage across your workflows.

---

## Steps to Create a DMS Config

- **Step 1:**  
  Go to the **Data Vault** section from the **left-hand navigation menu**.

- **Step 2:**  
  Click on the **Documents** tab at the top of the screen.

- **Step 3:**  
  Click **Create Folder**.  
  A popup will appear — enter the name of your folder.  
  For this example, name it **“Claims”**, since we’re setting this up for an insurance use case.

- **Step 4:**  
  Click **Save** to create the folder.

  ![: (Create Folder Popup ](/qdocs/App_Creation/WhatsApp/WhatsApp_DMS_Config/whats_app_dms_1.png)

- **Step 5:**  
  Once the folder is created, it’s ready to be used in your configuration.

- **Step 6:**  
  Now, go to **Global Configurations** from the **left-hand navigation menu**.

- **Step 7:**  
  Click the **plus (+) icon** to create a new configuration.

- **Step 8:**  
  Select the **configuration type** as **DMS Upload**.

- **Step 9:**  
  Give your config a **meaningful name**, such as `dms_claim_config`.

  ![: (Create Folder Popup ](/qdocs/App_Creation/WhatsApp/WhatsApp_DMS_Config/whats_app_dms_2.png)

- **Step 10:**  
  Under the **Selection Tree**, choose the folder you just created — in our case, **“Claims”**.

  ![: (Create Folder Popup ](/qdocs/App_Creation/WhatsApp/WhatsApp_DMS_Config/whats_app_dms_3.png)

- **Step 11:**  
  Click **Save** to finalize and store your configuration.

---

### Summary

You’ve now successfully created a **global DMS upload configuration**.

This config can be reused in any part of your agents that involves uploading or retrieving documents from your Data Vault folder.

Next, we will create a **WhatsApp Global Configuration** to enable sending messages through WhatsApp.