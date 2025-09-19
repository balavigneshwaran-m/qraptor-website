# Node Guide: POST API

## Overview

The **POST API** node allows you to **send data to an external system** using a POST request.  
You can configure the endpoint URL, set headers, add authentication, and include a JSON body with either fixed values or variables.  
This is useful when your workflow needs to create, update, or submit data to CRMs, support systems, databases, or any external APIs.

## What It Does

Once triggered:

● Sends a **POST request** to the configured API URL  

● Includes a **customizable JSON body** that can contain static values or variables  

● Passes along any required **headers**, **parameters**, or **path variables**  

● Handles **authentication** if needed  

● Stores the **response code**, **response body**, and **headers** in variables  

## Configuration Details

![ :( Can't load image ](/qdocs/Agent_Nodes/Api_Operations/POST_API/post_api.png)

1. **POST Endpoint URL**  

    ● Enter the URL of the API you want to call  

    ● You can include dynamic path variables like:  
      https://api.example.com/tickets/{{ticket_id}}  

2. **Headers and Request Parameters (Optional)**  

    ● Add key-value pairs such as:  
      `Content-Type: application/json`  

    ```
    Values can be typed manually or pulled from variables
    ```

3. **JSON Body**  

    ● Static JSON example:  
      ```
      {
        "user_id": 1234,
        "status": "active"
      }
      ```

    ● JSON with variables:  
      ```
      {
        "user_id": "{{user_id}}",
        "status": "{{status}}"
      }
      ```

4. **Authentication**  

    ● Choose from **Basic**, **Bearer**, or **OAuth2**  

    ● Credentials can be set manually or from variables  

5. **Test Before Apply**  

    ● Test the POST request in the configuration screen  

    ● Helps ensure the request works and the API returns the expected result  

## Inputs

● POST Endpoint URL

● Headers and Parameters (Optional)

● JSON Body (Static or with Variables)

● Authentication Details (Optional)


## Outputs

● **response_code** — Status code from the API (e.g., 200, 201, 400)  

● **response_body** — The actual response data (usually JSON)  

● **response_headers** — Metadata from the API response  

All outputs can be stored in variables for use in following nodes.

![ :( Can't load image ](/qdocs/Agent_Nodes/Api_Operations/POST_API/api_response.png)

## When to Use

Use the POST API node when you want to:  

● Create new records (tickets, users, forms, etc.)

● Send user data to an external system

● Trigger actions in another app with structured input


## Example Flow: Create Support Ticket in Helpdesk

### Scenario

You want to create a support ticket in your Helpdesk platform whenever a user submits a complaint.

### Flow Steps

1. **POST API Node**  

    ● URL: https://helpdesk.example.com/api/tickets  

    ● Authentication: Bearer Token from variable  

    ● JSON Body:  
      ```
      {
        "user_id": "{{user_id}}",
        "subject": "{{issue_subject}}",
        "message": "{{user_message}}"
      }
      ```

    ● Output: Save `response_body` to `ticket_data` variable  

2. **Send Message Node (Teams or WhatsApp)**  

    ● Message:  
      `"Your ticket {{ticket_data.id}} has been created successfully."`  

### Summary of the Flow

● Sends a POST request to the Helpdesk system

● Includes user-submitted data in the request body

● Reuses ticket ID from the response to notify the user