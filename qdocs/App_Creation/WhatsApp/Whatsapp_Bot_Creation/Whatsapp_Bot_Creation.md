## Introduction 

This document explains how to create a WhatsApp-based Vehicle Insurance Claim Management Application on this platform. The agent performs two primary operations:

- Creating new claims for policyholders.
- Answering queries related to existing claims.

In this guide, we will focus on building the flow for **creating a new claim**.

---

## Step 1: Application and Global Configuration Setup

1. Prepare the following prerequisites:
   - **WhatsApp Global Config**: This connects your WhatsApp bot to the WhatsApp Cloud API.
   - **DMS Global Config**: This allows storing images in a specific folder in the Data Vault.
   - **Entities**: Create `policy` and `claims` entities in the Data Vault to store policy and claim information.
2. Now go to the **Applications** tab.
3. Click **Create Application**.
4. Choose **WhatsApp Bot** as the application type.
5. Name the application as *Insurance Claim WhatsApp Application*.
6. Optionally add a description and logo.
7. Click **Create Application**.
8. On the application detail screen, edit and upload a logo if not already done.

![application landing page](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_1.png)

---

## Step 2: Creating the Agent

1. Go to the **Agents** tab inside the application.
2. Click on **Create Agent**.
3. Enter an appropriate name and description.
4. Click **Save**.
5. You"ll now see a blank canvas with the **Start Node** placed.
6. The left-hand panel contains all node categories for building the flow.

---

## Step 3: Setting Up Variables

1. Click on the **Variables** tab.
2. You’ll see pre-defined variables: `user_message` and `system_message`.

![Variables view](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_2.png)

3. Click **+** to add new variables.
4. Add variables like `phone_number`, `user_name`, `policy_number`, etc., and save them.
5. Variables can be deleted or modified anytime.

![Variables view](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_3.png)

---

## Step 4: Extracting Data from WhatsApp Payload

1. The **Start Node** receives a WhatsApp payload from the Super Agent.
2. Drag and drop a **JSON Mapper** node from the **Automation** section.
3. Connect it to the Start Node.
4. Set the JSON Payload as `user_message`.
5. Add a JSONPath expression to extract the phone number and map it to a variable `phone_number`.

![json mapper view](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_4.png)

---

## Step 5: Checking for Existing Policies

1. Drag and drop a **Select Row** node from **Data Management**.
2. Connect it to the JSON Mapper.
3. Choose the entity as `policy`.
4. Select columns like `user_name`, `policy_number`.
5. Add a match condition: `phone_number` = variable.
6. Optionally store the query result and execution status to variables.

![select row node 1](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_5.png)
---

## Step 6: Checking for Existing Claims

1. Add another **Select Row** node.
2. Choose entity `claims`.
3. Match on `policy_number` and `claim_status = new`.
4. Map the query result and status to `claim_id` and `query_status`.

![select row node 2](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_6.png)

---

## Step 7: Conditional Logic for Existing Claim Check

1. Add a **Condition** node.
2. Configure the condition to check if `query_status` is `"No match found"`.
3. Name the true branch as `"No Existing Claim"` and the false branch as `"Claim Exists"` for clarity.

![condition node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_7.png)

---

## Step 8: Flow if Claim Already Exists

1. For the false branch (`Existing Claim`), use a **Send Message (WhatsApp)** node.
2. Send a plain text message to inform the user they already have a claim in progress.

![send message node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_8.png)

---

## Step 9: Flow for New Claim Creation

1. For the true branch (`No Existing Claim`), configure the flow to process a new claim.
2. Send the user a **WhatsApp Form** using **Send Message Template** node.

![send message template node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_9.png)

3. Wait for the user’s form submission by using **Generic User Input** node from the **User Task** section.
4. Set input as `user_message` and map it to the same-named variable.

![generic user input node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_10.png)

---

## Step 10: Extracting Claim Details

1. The response will come back as part of `user_message`.
2. Use a **JSON Mapper** node to extract:
    - `claim_description`
    - `claim_date`
    - `claim_amount`
3. Map them to corresponding variables using JSONPath expressions.

![json mapper for claim details](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_11.png)

---

## Step 11: Inserting Claim Record

1. Use the **Insert Row** node.
2. Entity: `claims`.
3. Select the required columns to insert.
4. Map the generated primary key to `claim_id`.
5. Optionally map the insert status to another variable.

![insert row node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_12.png)

---

## Step 12: Claim Initiation Confirmation

1. Use **Send Message Template** node.
2. Provide template name, language, body variables, and WhatsApp Global Config.
3. Let the user know the claim has been initiated and share the `claim_id`.

![send message template for claim confirmation](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_13.png)

---

## Step 13: Description Similarity Check

1. Use **Claim Description Similarity Check** node from the **Claims Processing** section.
2. Inputs: `claim_id`, `claim_description`, `user_name`.
3. Map output to a variable. This contains feedback on whether the description was previously used.

![claim description similarity check](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_14.png)

4. Send this output to the user using **Send Message (WhatsApp)**.

![claim description similarity check send message](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_15.png)

---

## Step 14: Preparing for Image Upload 

1. Use **Script** node to create a name for the folder where images will be stored.

    - Note how the unput variables are extracted, this can be done by clicking on the varible that you want to use in the left panel of the script editor.
    - The outputs are stored in a dictionary called `result`, which is the expected format for creating scripts.

```python
user_name = input_variables['user_name']
claim_id =  input_variables['claim_id']

folder_name = user_name+ '_' + str(claim_id)

result = {
    "folder_name" : folder_name  
}
```

![script for folder name](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_16.png)

2. Map the output to a variable like `folder_name`.

![script for folder name op ](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_17.png)

3. Use **Create Folder** node from the **DMS** section.

4. provide the following inputs:
    - Folder Name: `folder_name`
    - DMS Global Config: Select the DMS config created earlier.
    - Map output to a variable like `folder_id`.
    - optionally map the status to another variable.

![create folder node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_18.png)

5. Use **Update Row** node to update the `claims` entity.
    - Set `folder_id` column to the value of `folder_id`.
    - Match on `claim_id`.

![update row for folder ID](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_19.png)

6. Inform the user to send **three images**:
    - Number plate
    - Damaged part
    - Whole vehicle

---

## Step 15: Receiving Image 1 (Number Plate)

1. Use **Send Message** node to ask for number plate image.

![send message for image request](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_20.png)

2. Use **Generic User Input** node to wait for the image.
3. Map input to `user_message`.

![generic user input for image](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_21.png)

4. A copy of the image is stored in the **temp** folder of Data Vault by the Super Agent. The image id is originally sent by whatsapp to the Super Agent, which is replaced with the image id of the image stored in the temp folder. The image id now present in the `user_message` variable is the one that will be used to move the image to the folder created earlier.


5. Extract the image ID using **JSON Mapper**:
    - Input: `user_message`
    - Extract image ID using JSONPath expression.
    - Map to a variable like `image_id`.

![json mapper for image ID](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_22.png)

6. Use **Script** node:
    - Hardcode name like `"vehicle_plate.jpg"` inside the `result` dictionary.

```python
# Script to generate filename for number plate image
number_plate_image = "vehicle_plate.jpg"
result = {"image_name": number_plate_image}
```

![script for image name](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_23.png)

7. Map output of script to a variable `image_name_1`.

![script for image name](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_24.png)

8. Use **Move From Temp Folder** (DMS node) to transfer the image from the temp folder to the created folder:

enter the following inputs:
    - File ID: `image_id`
    - Destination Folder ID: `folder_id`
    - Destination File Name: `image_name`
    - Optionally map the status to a variable.

![move from temp folder](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_25.png)


---

## Step 16: Receiving Image 2 (Damaged Part)

1. Repeat steps:
    - Ask user for image.
![send message for image request](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_26.png)
    - Wait using **Generic User Input**.
![generic user input for image](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_27.png)
    - Extract image ID via **JSON Mapper**.
![json mapper for image ID](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_28.png)
    - Generate filename via **Script** (e.g., `"damaged_part.jpg"`).
![script for image name](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_29.png)
    - Move file using **Move From Temp Folder**.
![move from temp folder](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_30.png)

---

## Step 17: Receiving Image 3 (Whole Vehicle)

1. Repeat same sequence:
    - Ask for image.
![send message for image request](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_31.png)
    - Wait for input.
![generic user input for image](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_32.png)
    - Extract ID.
![json mapper for image ID](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_33.png)
    - Generate name like `"whole_vehicle.jpg"`.
![script for image name](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_34.png)
    - Move image.
![move from temp folder](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_35.png)

---

## Step 18: Acknowledging Image Receipt

1. Use **Send Message** node to confirm image receipt.
![send message for image receipt](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_41.png)

---

## Step 19: Updating Claim Status

1. Use **Update Row** node.
2. Entity: `claims`.
3. Update `status` column to `"In Progress"`.
4. Match on `claim_id`.
5. Optionally map update status to a variable.
![Update row in progress](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_36.png)

---

## Step 20: Initial Fraud Detection

1. Use **Duplicate Claim Checker** node:
    - Inputs: `claim_id`, `folder_id`, `user_name`.
    - Output: Message about image duplication status.
![duplicate claim checker](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_37.png)

2. Send this message to the user via **Send Message** node.
![send message for duplicate claim](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_38.png)

3. Use **Claim Image Description Similarity Checker** node:
    - Inputs: `claim_id`, `user_name`, `folder_id`, `claim_description`.
    - Output: Feedback message.
![claim image description similarity checker](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_39.png)

4. Send output via **Send Message** node.
![send message for image description similarity](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_40.png)

---

## Conclusion

1. This completes the Claim Management Agent.
2. The next step is configuring the **Super Agent** for handling routing and delegation.