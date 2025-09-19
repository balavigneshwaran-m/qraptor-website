## Introduction

In this tutorial, we’ll walk through how to create a **WhatsApp Global Configuration**.

This configuration connects your WhatsApp bot to the **WhatsApp Cloud API**, allowing your workflows to send messages to users using your WhatsApp Business number.

---

## Prerequisites

Before you begin, make sure you have the following set up:

- A **Meta for Developers** account  
- An **application** created on the platform with a business portfolio integrated  
- The **WhatsApp product** added to your app  

These are required to access the necessary credentials from Meta.  
Refer to the official documentation for setup instructions:  
[WhatsApp Cloud API Overview](https://developers.facebook.com/docs/whatsapp/cloud-api/overview)

---

## Steps to Create a WhatsApp Global Config

- **Step 1:**  
  Go to the **Global Configurations** section from the **left-hand navigation menu**.

- **Step 2:**  
  Click the **plus (+) icon** to create a new configuration.

- **Step 3:**  
  From the dropdown, select the **configuration type** as **WhatsApp Config**.  
  ![: (Configuration Type Selection](/qdocs/App_Creation/WhatsApp/WhatsApp_Whatsapp_Config/whats_app_whastappConfig_1.png)

- **Step 4:**  
  Give your config a **meaningful name**.  
  For example: `WhatsApp_global_config`.

- **Step 5:**  
  In the **Phone Number ID** field, enter the **Phone Number ID** of your WhatsApp Business account.  
  You can find this in the **Meta for Developers** portal, inside your app, under **WhatsApp > API Setup**.  
  ![: (WhatsApp Phone Number ID and config name](/qdocs/App_Creation/WhatsApp/WhatsApp_Whatsapp_Config/whats_app_whastappConfig_2.jpg)

- **Step 6:**  
  In the **Auth Token** field, enter your **permanent access token**.  
  This can also be found in the **WhatsApp > API Setup** section.

- **Step 7:**  
  Enter the **Verify Token** — this is a custom token that **you define**.  
  You’ll use this same token while configuring the webhook under **WhatsApp > Configuration** in your Meta app.  
  ![: (WhatsApp Verify Token Input](/qdocs/App_Creation/WhatsApp/WhatsApp_Whatsapp_Config/whats_app_whastappConfig_3.jpg)

- **Step 8:**  
  Once all fields are filled, click **Create** to complete and store the configuration.

---

### Summary

You’ve now successfully created a **WhatsApp Global Configuration**.

This configuration can be used across your bot workflows to send messages through your **WhatsApp Business account via the Cloud API**.

Next, we will create a **WhatsApp bot application** to see a practical example in action.
 