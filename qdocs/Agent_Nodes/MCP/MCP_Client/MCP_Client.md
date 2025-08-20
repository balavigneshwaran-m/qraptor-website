# Node Guide: MCP Client

## Overview

The **MCP Client** node allows you to connect to an external **MCP Server** and fetch data using its available tools.  
You can configure the server URL, select tools exposed by that server, provide necessary input parameters, and map the outputs into variables for use in your workflow.  
This is useful when you want to integrate your workflow with an MCP-powered system, fetch real-time information, or test tools from an MCP Server before deploying your flow.

## What It Does

Once configured and triggered:

● Connects to the provided **MCP Server URL**  
● Retrieves the list of tools exposed by that server  
● Allows you to select a specific tool and configure its parameters  
● Executes the tool with the given inputs  
● Captures and stores the **response** from the MCP Server into workflow variables  
● Provides a **Test Tool** feature to validate tool execution before finalizing the node setup  

## Configuration Details

### 1. Server Management

- **MCP Server URL**

  ● Enter the URL of the MCP Server you want to connect to

  ● The MCP Server must be hosted publicly.

  ![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_1.png)

  ● Once entered, click **Connect** – this will fetch and display the available tools from that server

  ![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_2.png)

  ● Set the server as active for further configuration

  ![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_3.png)

  ![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_4.png)

---

### 2. Tool Configuration

1. **Select Tool**

   ● Choose the tool you want to use from the dropdown list of tools exposed by the MCP Server

![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_5.png) 

2. **Tool Parameters** 

   ● Based on the selected tool, provide the required parameters

   ● Parameters can be typed manually or referenced dynamically using variables

![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_6.png)

3. **Output Mapping** 

   ● Map the response fields from the MCP Server to your workflow variables 

   ● This allows seamless usage of the server output in the rest of your workflow

![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_7.png) 

4. **Test Tool** 
 
   ● Use the **Test Tool** button to test the selected tool with your inputs 

   ● View the actual server response in real-time  

   ● Verify whether the configuration is correct before applying it to the workflow

   ● Please note while testing, please input the actual value and test, and after testing, replace it with the variable.

![ :( Can't load image ](/qdocs/Agent_Nodes/MCP/MCP_Client/MCP_Client_Image_8.png)

---

## Inputs

- MCP Server URL
- Tool Parameters (depending on the selected tool)


## Outputs

● response — The full response from the MCP Server  
● You can map specific response values into workflow variables for reuse  

---

## When to Use

Use the MCP Client node when you want to:

- Fetch data or insights from an external MCP Server
- Test available tools before integrating them in a live flow
- Automate workflows by pulling dynamic responses from MCP tools



---

# Example Flow: Fetch Current Time from MCP Server

## Scenario

You want to retrieve the **current time** for a given timezone using the `getTime` tool from the MCP Server hosted at:

https://time.mcp.inevitable.fyi/mcp



## Flow Steps

1. **MCP Client Node**  
   - **MCP Server URL:** `https://time.mcp.inevitable.fyi/mcp`  
   - **Select Tool:** `get_current_time`  
   - **Input Parameter:**  
     - Select the variable for **timezone** from the dropdown (e.g., `user_timezone`).  
   - **Map Output:**  
     - Map the tool response to a variable (e.g., `current_time`).  

2. **Send Message Node**  
   - Send a confirmation message:  
     ```
     "The current time in {{user_timezone}} is {{current_time}}."
     ```

---

## Summary of the Flow

- Connects to the public **MCP Time Server**  
- Uses the `getTime` tool to fetch current time based on the provided timezone  
- Stores the result in the variable `current_time`  
- Sends a user-friendly message with the exact time  


---

## Summary of the Flow

- Connects to the public **MCP Time Server**  
- Uses the `getTime` tool to fetch current time based on the provided timezone  
- Stores the result in the variable `current_time`  
- Sends a user-friendly message with the exact time