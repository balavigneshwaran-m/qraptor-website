# Node Guide: Send Message (WhatsApp)

## Overview

The **Send Message (WhatsApp)** node is used to **send a text message** to a user through WhatsApp.  
This node is typically placed near the **end of a workflow** to notify or respond to users directly via WhatsApp.

You can send:
- A **custom typed message**
- A **message from a variable** defined earlier in the workflow

---

## How It Works

When this node executes:

- It takes a **text message** (either manually written or from a variable)
- Uses your pre-configured **WhatsApp setup** to send the message
- Delivers the message to the user’s **WhatsApp account**

---

## Configuration Details

###  Message Content

You must provide the actual message to send. This can be:

- A **manually typed** message  
  e.g., `"Hello, your request has been processed."`

- A **variable-based** message  
  e.g., `"Hi {{userName}}, your ticket #{{ticketId}} is resolved."`

###  WhatsApp Configuration

- Select a **WhatsApp integration** from Global Configurations
- This setup handles **authentication and message delivery**

![ :( Can't load image ](/qdocs/Agent_Nodes/Whatsapp_Nodes/Send_Message_Whatsapp/whatsapp_send_message.png)

---

## Inputs

- **Message Content**:  
  Accepts static text or a variable holding dynamic content

---

## Outputs

- **No Output Data**:  
  This node **does not return** any value.  
  Its purpose is to **deliver** the message only.

---

## When to Use

Use this node when you:

- Want to **notify** users through WhatsApp
- Need to **send final updates**, confirmations, or alerts
- Wish to include **dynamic values** (usernames, ticket IDs, etc.) in your messages

---

## Example Flow: Notify Customer on Ticket Update

### Scenario

A customer logs a support ticket. Once resolved, the system sends a WhatsApp message confirming the resolution.

### Flow Steps

1. **Ticket Processed**  
   - The workflow resolves the support ticket

2. **Create Message**  
   - Example:  
     `"Hi {{userName}}, your support ticket #{{ticketId}} has been resolved."`

3. **Send Message (WhatsApp) Node**  
   - Insert the message (typed or variable-based)  
   - Use an existing WhatsApp configuration

---

## Summary

- Direct way to **communicate with users** on WhatsApp
- Sends a **text message**, either typed or generated dynamically
- Works best as a **final step** in automated workflows