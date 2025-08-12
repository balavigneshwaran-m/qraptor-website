# Node Guide: PUT API

## Overview

The **PUT API** node allows you to **update data in an external system** using a PUT request.  
You provide the endpoint, required headers and authentication, and a customizable JSON body — which can include values from your workflow variables.  
This is typically used to modify or replace existing records in a database, CRM, or any third-party system.

## What It Does

Once triggered:

● Sends a **PUT request** to the specified API URL  

● Includes a **JSON body** that can be static or dynamic (with variables)  

● Accepts **headers**, **path parameters**, and **authentication** if needed  

● Saves the **response code**, **response body**, and **headers** in variables  

## Configuration Details

![ :( Can't load image ](/qdocs/Agent_Nodes/Api_Operations/PUT_API/PUT_API.png)

1. **PUT Endpoint URL**  

    ● Enter the URL of the API you want to call  

    ● You can include dynamic path variables like:  
      https://api.example.com/users/{{user_id}}  

2. **Headers and Request Parameters (Optional)**  

    ● Add key-value pairs such as:  
      `Content-Type: application/json`  

    ```
    Values can be static or pulled from workflow variables
    ```

3. **JSON Body**  

    ● Example with static values:  
      ```
      {
        "name": "John Doe",
        "status": "active"
      }
      ```

    ● Example with variables:  
      ```
      {
        "name": "{{user_name}}",
        "status": "{{user_status}}"
      }
      ```

4. **Authentication**  

    ● Choose from **Basic**, **Bearer**, or **OAuth2**  

    ● Credentials can be set manually or from variables  

5. **Test Before Apply**  

    ● Test the PUT request before saving  

    ● Helps confirm the setup is correct and the endpoint is reachable  

## Inputs

● PUT Endpoint URL

● Headers and Request Parameters (Optional)

● JSON Body (Static or with Variables)

● Authentication Details (Optional)


## Outputs

● **response_code** — HTTP status code from the response  

● **response_body** — Full content returned by the API (usually JSON)  

● **response_headers** — Metadata from the API response  

All outputs can be stored in variables for use in later workflow steps.

![ :( Can't load image ](/qdocs/Agent_Nodes/Api_Operations/PUT_API/PUT_API_RES.png)

## When to Use

Use the PUT API node when you want to:  

● Update user profiles or records in another system

● Change the status or data of an existing entry

● Overwrite resources with new values


## Example Flow: Update User Subscription Plan

### Scenario

You want to upgrade a user's subscription in your billing system after payment is confirmed.

### Flow Steps

1. **PUT API Node**  

    ● URL: https://billing.example.com/api/users/{{user_id}}/subscription  

    ● Authentication: Bearer token stored in a variable  

    ● JSON Body:  
      ```
      {
        "plan": "{{new_plan}}",
        "renewal": true
      }
      ```

    ● Output: Save `response_body` to `update_status` variable  

2. **Send Message Node (Teams or WhatsApp)**  

    ● Message:  
      `"Hi {{user_name}}, your subscription has been updated to the {{new_plan}} plan."`  

### Summary of the Flow

● Sends a PUT request to update the user’s subscription in an external system

● Saves the response and uses it to notify the user with confirmation