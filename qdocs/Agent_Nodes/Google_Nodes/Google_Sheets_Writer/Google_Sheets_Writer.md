# Node Guide: Google Sheets Writer

## Overview

The **Google Sheets Writer** node allows you to insert or update data in a Google Sheets workbook.  
You can choose the sheet, writing mode, start cell, and data source (manual input or variable).  
This node supports flexible writing strategies like appending, overwriting, or clearing sheets entirely.  

It is useful for workflows that need to **log, update, or export results into Google Sheets** for reporting, tracking, or collaboration.

---

## What It Does

Once executed, this node:

- Connects to the specified Google Sheets workbook.  
- Writes data into the configured **sheet and start cell**.  
- Supports multiple **write modes** (append, overwrite, clear + write).  
- Optionally includes **headers** when writing data.  
- Stores the **status, rows written, and CSV data** in variables.  

---

## Configuration Details

### Google Sheets URL
   - Sheet must be shared as "Anyone with the link can view"

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_3.png)

### 1. Sheet Settings

#### **Sheet Name**  
  - The name of the sheet where data should be written.  
  - Can be typed or referenced from a variable.  

#### **Write Mode**  
  1. **Append To Existing Data** → Adds new rows without deleting existing content.  
  2. **Overwrite From Start Cell** → Overwrites from the specified start cell.  
  3. **Clear Sheet and Write New** → Clears the entire sheet, then writes fresh data.  

#### **Start Cell**  
  - Define the start cell (e.g., `A1`).  
  - Can be typed directly or pulled from a variable.  

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_4.png)

---

### 2. Data Source

#### **Variable Input**  
  - Select a variable containing a data array.  

#### **Manual Input**  
  - Add column headers and row data manually.  
  - Alternatively, paste a JSON array directly into the JSON editor.  

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_5.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_6.png)

---

### 3. Writing Options

#### **Include Headers (Yes/No)**  
  - If Yes, the first row will contain column headers.  

---

### 4. Test Configuration

- Use the **Test Write** feature to preview what data will be written.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_7.png)

- Manual instructions will guide you on writing the test data to the sheet.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_8.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_9.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_10.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_11.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_12.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_13.png)

---

### 5. Webhook Configuration (Automation)

For full automation, you can configure a **Google Apps Script Webhook**:

#### 1. Create a new project in **Google Apps Script**.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Step1.png)

#### 2. Write the code to insert data into the sheet.  
   Example:  

   ```javascript
   function doPost(e) {
     var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName("Sheet1");
     var data = JSON.parse(e.postData.contents);
     sheet.getRange(sheet.getLastRow() + 1, 1, data.length, data[0].length).setValues(data);
     return ContentService.createTextOutput("Success");
   }
   ```

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Step2.png)

#### 3. Click on New Deployment.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Step3.png)

#### 4. Manage access → set to Anyone.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Step4.png)

#### 5. Copy the Web App URL and paste it in the node configuration.

Note: If Webhook Configuration is not provided, you will need to import the CSV manually.
And in end to end flow a csv file will ge generated.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Step5.png)

## Inputs

- URL of the Google Sheets workbook (must be shared as "Anyone with the link can view")
- Sheet Name
- Write Mode (Append / Overwrite / Clear + Write)
- Start Cell
- Data Source (Variable / Manual / JSON)
- Writing Options (Include Headers)

## Outputs

- status → Success or failure of the write operation.
- rows → Number of rows successfully written.
- csv_data → The exact data written to the sheet.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Writer/Google_Sheets_Writer_Image_14.png)

All outputs are stored in variables for use in later nodes.

## When to Use

Use the Google Sheets Writer node when you want to:

- Export workflow results into Google Sheets
- Append logs or records for tracking
- Update existing sheets with new values
- Automate reporting or data sharing

## Example Flow: Log Survey Responses
### Scenario

You are running a customer survey and want to log every response directly into a Google Sheet for your team to review.

### Flow Steps

#### 1. User Input Node
   - Collect user inputs (Name, Email, Feedback).

#### 2. Google Sheets Writer Node
   - URL: https://docs.google.com/spreadsheets/d/your-sheet-id
   - Sheet Name: Responses
   - Write Mode: Append to Existing Data
   - Start Cell: A1
   - Data Source: Variable (survey_responses)
   - Include Headers: Yes

#### 3. Condition Node
   - Check if status == "Success".

#### 4. Send Message Node (WhatsApp)
   - Send confirmation to the user: "Thanks {{name}}, your feedback has been recorded!"

## Summary of the Flow
- Collects survey responses from users
- Logs them into a Google Sheet automatically
- Confirms successful logging to the user