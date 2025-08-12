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
7. Now go to the **Applications** tab.
8. Click **Create Application**.
9. Choose **WhatsApp Bot** as the application type.
10. Name the application as *Insurance Claim WhatsApp Application*.
11. Optionally add a description and logo.
12. Click **Create Application**.
13. On the application detail screen, edit and upload a logo if not already done.

![: (application landing page](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_1.png)

---

## Step 2: Creating the Agent

14. Go to the **Agents** tab inside the application.
15. Click on **Create Agent**.
16. Enter an appropriate name and description.
17. Click **Save**.
18. You’ll now see a blank canvas with the **Start Node** placed.
19. The left-hand panel contains all node categories for building the flow.

---

## Step 3: Setting Up Variables

20. Click on the **Variables** tab.
21. You’ll see pre-defined variables: `user_message` and `system_message`.

22. Click **+** to add new variables.
23. Add variables like `phone_number`, `user_name`, `policy_number`, etc., and save them.
24. Variables can be deleted or modified anytime.

---

## Step 4: Extracting Data from WhatsApp Payload

25. The **Start Node** receives a WhatsApp payload from the Super Agent.
26. Drag and drop a **JSON Mapper** node from the **Automation** section.
27. Connect it to the Start Node.
28. Set the JSON Payload as `user_message`.
29. Add a JSONPath expression to extract the phone number and map it to a variable `phone_number`.


---

## Step 5: Checking for Existing Policies

30. Drag and drop a **Select Row** node from **Data Management**.
31. Connect it to the JSON Mapper.
32. Choose the entity as `policy`.
33. Select columns like `user_name`, `policy_number`.
34. Add a match condition: `phone_number` = variable.
35. Optionally store the query result and execution status to variables.

---

## Step 6: Checking for Existing Claims

36. Add another **Select Row** node.
37. Choose entity `claims`.
38. Match on `policy_number` and `claim_status = new`.
39. Map the query result and status to `claim_id` and `query_status`.

---

## Step 7: Conditional Logic for Existing Claim Check

40. Add a **Condition** node.
41. Configure the condition to check if `query_status` is `"No match found"`.
42. Name the true branch as `"No Existing Claim"` and the false branch as `"Claim Exists"` for clarity.

---

## Step 8: Flow if Claim Already Exists

43. For the false branch (`Existing Claim`), use a **Send Message (WhatsApp)** node.
44. Send a plain text message to inform the user they already have a claim in progress.

![: (send message node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_2.png)

---

## Step 9: Flow for New Claim Creation

45. For the true branch (`No Existing Claim`), configure the flow to process a new claim.
46. Send the user a **WhatsApp Form** using **Send Message Template** node.

![: (send message template node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_3.png)

47. Wait for the user’s form submission by using **Generic User Input** node from the **User Task** section.
48. Set input as `user_message` and map it to the same-named variable.

![: (generic user input node](/qdocs/App_Creation/WhatsApp/Whatsapp_Bot_Creation/whats_app_bot_4.png)

---

## Step 10: Extracting Claim Details

49. The response will come back as part of `user_message`.
50. Use a **JSON Mapper** node to extract:
    - `claim_description`
    - `claim_date`
    - `claim_amount`
51. Map them to corresponding variables using JSONPath expressions.

---

## Step 11: Inserting Claim Record

52. Use the **Insert Row** node.
53. Entity: `claims`.
54. Select the required columns to insert.
55. Map the generated primary key to `claim_id`.
56. Optionally map the insert status to another variable.

---

## Step 12: Claim Initiation Confirmation

57. Use **Send Message Template** node.
58. Provide template name, language, body variables, and WhatsApp Global Config.
59. Let the user know the claim has been initiated and share the `claim_id`.


---

## Step 13: Description Similarity Check

60. Use **Claim Description Similarity Check** node from the **Claims Processing** section.
61. Inputs: `claim_id`, `claim_description`, `user_name`.
62. Map output to a variable. This contains feedback on whether the description was previously used.


63. Send this output to the user using **Send Message (WhatsApp)**.

---

## Step 14: Preparing for Image Upload 

64. Use **Script** node to create a name for the folder where images will be stored.

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

65. Map the output to a variable like `folder_name`.


66. Use **Create Folder** node from the **DMS** section.

67. provide the following inputs:
    - Folder Name: `folder_name`
    - DMS Global Config: Select the DMS config created earlier.
    - Map output to a variable like `folder_id`.
    - optionally map the status to another variable.


68. Use **Update Row** node to update the `claims` entity.
    - Set `folder_id` column to the value of `folder_id`.
    - Match on `claim_id`.

69. Inform the user to send **three images**:
    - Number plate
    - Damaged part
    - Whole vehicle

---

## Step 15: Receiving Image 1 (Number Plate)

70. Use **Send Message** node to ask for number plate image.


71. Use **Generic User Input** node to wait for the image.
72. Map input to `user_message`.


73. A copy of the image is stored in the **temp** folder of Data Vault by the Super Agent. The image id is originally sent by whatsapp to the Super Agent, which is replaced with the image id of the image stored in the temp folder. The image id now present in the `user_message` variable is the one that will be used to move the image to the folder created earlier.


74. Extract the image ID using **JSON Mapper**:
    - Input: `user_message`
    - Extract image ID using JSONPath expression.
    - Map to a variable like `image_id`.


75. Use **Script** node:
    - Hardcode name like `"vehicle_plate.jpg"` inside the `result` dictionary.

```python
# Script to generate filename for number plate image
number_plate_image = "vehicle_plate.jpg"
result = {"image_name": number_plate_image}
```

76. Map output of script to a variable `image_name_1`.


77. Use **Move From Temp Folder** (DMS node) to transfer the image from the temp folder to the created folder:

enter the following inputs:
    - File ID: `image_id`
    - Destination Folder ID: `folder_id`
    - Destination File Name: `image_name`
    - Optionally map the status to a variable.

---

## Step 16: Receiving Image 2 (Damaged Part)

78. Repeat steps:
    - Ask user for image.
    - Wait using **Generic User Input**.
    - Extract image ID via **JSON Mapper**.
    - Generate filename via **Script** (e.g., `"damaged_part.jpg"`).
    - Move file using **Move From Temp Folder**.

---

## Step 17: Receiving Image 3 (Whole Vehicle)

79. Repeat same sequence:
    - Ask for image.
    - Wait for input.
    - Extract ID.
    - Generate name like `"whole_vehicle.jpg"`.
    - Move image.

---

## Step 18: Acknowledging Image Receipt

80. Use **Send Message** node to confirm image receipt.

---

## Step 19: Updating Claim Status

81. Use **Update Row** node.
82. Entity: `claims`.
83. Update `status` column to `"In Progress"`.
84. Match on `claim_id`.
85. Optionally map update status to a variable.


---

## Step 20: Initial Fraud Detection

86. Use **Duplicate Claim Checker** node:
    - Inputs: `claim_id`, `folder_id`, `user_name`.
    - Output: Message about image duplication status.


87. Send this message to the user via **Send Message** node.


88. Use **Claim Image Description Similarity Checker** node:
    - Inputs: `claim_id`, `user_name`, `folder_id`, `claim_description`.
    - Output: Feedback message.

89. Send output via **Send Message** node.

---

## Conclusion

90. This completes the Claim Management Agent.
91. The next step is configuring the **Super Agent** for handling routing and delegation.