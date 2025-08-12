# Node Guide: DELETE API

## Overview

The **DELETE API** node is used to **remove or delete data from an external system** by calling a configured DELETE endpoint.  
You can include path parameters, headers, and authentication, and optionally use variables to dynamically control what gets deleted.

## What It Does

Once triggered:

● Sends a **DELETE request** to the specified API URL  

● Optionally includes **headers** and **authentication**  

● Supports **dynamic path variables**  

● Captures the **response code**, **response body**, and **headers**  

## Configuration Details

![ :( Can't load image ](/qdocs/Agent_Nodes/Api_Operations/DELETE_API/DELETE_API.png)

1. **DELETE Endpoint URL**  

    ● Enter the URL of the API where the delete operation will be performed  

    ● You can include dynamic path variables like:  
      https://api.example.com/users/{{user_id}}  

2. **Headers and Request Parameters (Optional)**  

    ● Add key-value pairs such as:  
      `Authorization: Bearer {{access_token}}`  

    ```
    Values can be static or pulled from workflow variables
    ```

3. **Authentication**  

    ● Choose from **Basic**, **Bearer**, or **OAuth2**  

    ● Credentials or tokens can be static or pulled from variables  

4. **Test Before Apply**  

    ● Use the built-in test feature to verify your API setup  

    ● Helps ensure the DELETE call works before saving  

## Inputs

● DELETE Endpoint URL

● Headers and Request Parameters (Optional)

● Authentication Details (Optional)


## Outputs

● **response_code** — Status code returned by the API (e.g., 200, 204)  

● **response_body** — The body of the response (if any)  

● **response_headers** — Headers returned by the API  

All outputs can be saved to variables for use in later steps.

![ :( Can't load image ](/qdocs/Agent_Nodes/Api_Operations/DELETE_API/DELETE_API_RES.png)

## When to Use

Use the DELETE API node when you want to:  

● Remove a user or record from a system

● Cancel or delete a subscription

● Clean up unwanted or temporary data

● Trigger cleanup operations in third-party tools


## Example Flow: Delete a User After Account Deactivation

### Scenario

When a user deactivates their account, you want to remove their data from your CRM system.

### Flow Steps

1. **DELETE API Node**  

    ● URL: https://crm.example.com/api/users/{{user_id}}  

    ● Authentication: Bearer token from variable `crm_token`  

    ● No body needed — path parameter handles it  

    ● Output: Save `response_code` to `delete_status` variable  

2. **Condition Node**  

    ● If `delete_status == 204`, send a confirmation message to the user  

    ● If deletion fails, alert the support team  

### Summary of the Flow

● Sends a DELETE request to remove user data from the external system

● Checks the response and triggers follow-up actions accordingly