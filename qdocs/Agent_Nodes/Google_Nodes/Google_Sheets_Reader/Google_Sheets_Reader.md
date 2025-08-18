# Node Guide: Google Sheets Reader

## Overview

The **Google Sheets Reader** node allows you to fetch and read data directly from a Google Sheets workbook.  
It provides flexible options to select the sheet, range, and rows to be read, while storing the result in variables for downstream use.  
This is useful for workflows that rely on dynamic data stored in spreadsheets, such as reports, configurations, or tabular datasets.

## What It Does

Once executed:

- Reads data from the specified **Google Sheets workbook** (via its public link).  
- Supports selecting a **specific sheet** within the workbook.
  (The sheet must be shared as "Anyone with this link can view") 
- Allows defining a **cell range** (e.g., `A1:E10`) or reading the entire sheet.  
- Provides **options to include headers** and **limit rows**.  
- Stores the results (data, status, and row count) into variables.  

## Configuration Details

### Google Sheets URL
   - Sheet must be shared as "Anyone with the link can view"

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_2.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_3.png)

### **Sheet Name**  
   - Enter the name of the sheet you want to read.  
   - Can be typed directly or referenced from a variable. 

### **Range (Optional)**  
   - Define the cell range (e.g., `A1:E10`) to read specific data.  
   - If not provided, the node will read the entire sheet.  

### **Reading Options**  
   - **Include Headers (Yes/No):** Choose whether to include the column headers.  
   - **Row Limit:** Maximum number of rows to fetch.  
     - If not set, all rows are read.  
     - `0` means unlimited.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_4.png)  

### **Test Read**  
   - Test fetching the data during configuration.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_5.png) 

   - Preview results in **Table View** or **JSON View**.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_6.png) 

   - Option to export results as CSV or download as JSON.  

## Inputs

● URL of the Google Sheets workbook (must be shared as "Anyone with the link can view")

● Sheet Name

● Range (Optional)

● Reading Options (Include Headers, Row Limit)


## Outputs

- **status** — Success or failure of the data fetch.  
- **data** — The actual data read from the sheet.  
- **count** — The number of rows read.

![ :( Can't load image ](/qdocs/Agent_Nodes/Google_Nodes/Google_Sheets_Reader/Google_Sheets_Reader_Image_7.png) 


_All outputs are stored in variables for use in later nodes._

## When to Use

Use the Google Sheets Reader node when you need to:

● Fetch and use data stored in Google Sheets

● Dynamically drive workflows with external spreadsheet data

● Filter or limit data being imported into your flow

● Perform reporting, automation, or conditional logic based on sheet contents


## Example Flow: Import Product Catalog

### Scenario

Your product team maintains a product catalog in Google Sheets. You want to fetch the latest catalog data and use it to update your application or generate a report.

### Flow Steps

1. **Google Sheets Reader Node**  
   - URL: `https://docs.google.com/spreadsheets/d/your-sheet-id`  
   - Sheet Name: `Products`  
   - Range: `A1:D100`  
   - Include Headers: Yes  
   - Row Limit: 100  

2. **Condition Node**  
   - Check if `status == "Success"`.  

3. **Next Node** (e.g., Message or Database Update)  
   - Use the `data` variable to process or display the sheet content.  

### Summary of the Flow

● Reads data from Google Sheets

● Stores the output (data + row count) in variables

● Uses the imported data for reporting or further workflow logic