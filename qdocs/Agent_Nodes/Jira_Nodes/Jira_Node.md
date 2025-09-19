# Node Guide: Jira Node

## Overview
The Jira Node is used to automatically create issues in your Jira board as part of a workflow. It connects with your Jira instance using API access and allows you to raise tickets based on dynamic input from your platform.  
This node is useful when you want to integrate ticket creation into your automated processes, such as logging bugs, support requests, or technical issues based on user interactions or system events.

## How It Works
When this node runs:
- It sends a request to the specified Jira API URL  
- It uses the chosen authentication method to connect  
- It creates an issue with the given details  
- It captures the response from Jira, which can be stored in variables for later use  

## What You Need to Configure

![ :( Can't load image ](/qdocs/Agent_Nodes/Jira_Nodes/jira_node.png)

### 1. API URL
The endpoint of your Jira board where issues should be created.  
**Example:** `https://yourdomain.atlassian.net/rest/api/2/issue`

### 2. Authentication Method
How the node should connect to Jira. Supported options:
- Basic Authentication  
- OAuth2  
- Bearer Token  

Choose based on your Jira setup.

### 3. Ticket Type
Specify the type of issue you want to create:
- Bug  
- Support  
- Technical  

This helps Jira categorize the ticket correctly.

### 4. Description
Provide the content or message for the issue. This can include static text or dynamic content pulled from earlier steps in the workflow.

### 5. Capture Response
You can choose to store the response code and response body (from Jira) in workflow variables.  
This helps in tracking the success or failure of the request and allows further actions based on Jira’s response.

## Output
The node returns a JSON response from Jira, which includes:
- Ticket ID  
- Issue key  
- Status code  
- Other metadata  

You can store and use this response in downstream nodes.

## When to Use
Use the Jira Node whenever your workflow needs to:
- Log a bug reported through chat, email, or form  
- Create support or service tickets based on user actions  
- Automate issue tracking when something fails in your system  

It helps keep your team informed and ensures no reported issue is missed.

## Example Flow: Logging a Support Ticket from Chat

![ :( Can't load image ](/qdocs/Agent_Nodes/Jira_Nodes/jira_node_example.png)

### Scenario
A user sends a message through Microsoft Teams saying they’re facing a login issue. The system should log this as a support ticket in Jira automatically.

### Flow Steps

**1. Receive User Message**  
Trigger the flow when a message is received on Teams.

**2. Extract Message Content**  
Get the user’s message, name, and channel.

**3. Generate Issue Description**  
Create a ticket description combining the user’s message and metadata.

**4. Jira Node**  
Use the Jira Node to create a ticket in the Support category, using:
- The Jira API URL  
- Proper authentication  
- Issue type as "Support"  
- The dynamically created description  
- Store the ticket ID and status in variables  

## Summary of the Flow
- A user writes: “I can't log into the system.”  
- The workflow builds a proper description using this message.  
- The Jira Node creates a ticket on the board.  
- The system can then send the user a reply with the ticket number or log it internally.