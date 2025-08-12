# Node Guide: Send Message (Teams)

## Overview
The **Send Message** node is used to send a direct message to a user on **Microsoft Teams**. It’s typically used at the end of a workflow to notify someone or respond to a conversation.

You can use it to send static messages or dynamic content gathered from earlier steps in the flow.

---

## How It Works

When this node executes:

- It connects to Microsoft Teams using a predefined Teams configuration.
- Sends a message to the user in an ongoing conversation.
- The message can be:
  - **Static** (typed in directly), or
  - **Dynamic** (pulled from a variable).
- Once sent, the workflow continues.  
  _This node does **not** return any output._

---

## What You Need to Configure

### 1. **Text Message**
The message you want to send to the user. This can be:
- A fixed custom message (e.g., `"Your request is complete."`)
- A variable (e.g., response from another system)

### 2. **Service URL**
- The Microsoft Teams **service URL** required to deliver the message.
- Usually obtained from the Teams connector or configuration.

### 3. **Conversation ID**
- The **unique ID** of the conversation with the user.
- Ensures the message goes to the correct user or group.

### 4. **Teams Configuration**
- Choose from pre-defined Teams configurations under **Global Configurations**.
- This contains app ID, secret, and endpoint setup.

![ :( Can't load image ](/qdocs/Agent_Nodes/Teams_Nodes/Teams_send_message/Teams_Send_Message.png)

---

## Output

This node performs an action (sending a message) but does **not return** any output variable.

---

## When to Use

Use the Send Message node when you want to:
- Send a **confirmation** or **status update** on Teams
- Respond to a **user query** within an existing conversation
- Deliver **results** from another system (e.g., ticket number, approval status)
- Complete an automation loop with a message to the user

---

## Example Flow: Notify a User When Their Ticket Is Resolved

### Scenario
A user reports an issue via Teams. After the issue is resolved, a message should be sent confirming the resolution.

### Flow Steps

1. **Capture Message from Teams**  
   - Triggered when a user sends a message (e.g., "I'm facing a login issue").

2. **Create Ticket in Jira**  
   - A support ticket is created using the Jira Node.

3. **Wait for Resolution**  
   - Workflow waits until the ticket is marked as resolved.

4. **Send Message (Teams)**  
   - Message: `"Your issue has been resolved. Ticket ID: 12345"`  
   - Uses:
     - Service URL
     - Conversation ID (from earlier step)

![ :( Can't load image ](/qdocs/Agent_Nodes/Teams_Nodes/Teams_send_message/Teams_Send_Message_Example.png)

---

## Summary of the Flow
- A user reports a problem on Teams  
- The system handles and monitors the issue  
- Once resolved, a message is sent to the user via Teams using the **Send Message** node