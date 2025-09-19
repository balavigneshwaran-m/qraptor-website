# Node Guide: Message Card Template (Microsoft Teams)

## Overview

The **Message Card Template** node is used to send a custom-designed message card to a user on **Microsoft Teams**. These cards can act as **interactive forms** or **clickable messages**, making them ideal for workflows that require user input or action.

This node enables **full customization** of the card layout, design, and content.

---

## How It Works

When this node runs:

- It connects to Microsoft Teams using the selected configuration.
- Sends a **rich message card** (form or action card) to the user.
- The card may include:
  - Custom text
  - Input fields
  - Buttons (e.g., **Submit**, **Open URL**)
- Once sent, the workflow continues.  
_This node does **not** return any output._

---

## What You Need to Configure

### 1. **Service URL**
- The Teams **Service URL** used to send the message.
- Usually retrieved from the initial Teams message or your system configuration.

### 2. **Conversation ID**
- The ID of the conversation where the card should be sent.
- Ensures correct targeting to the user or thread.

### 3. **Teams Configuration**
- Choose a **Teams Configuration** from the global configurations.
- This includes:
  - App ID
  - App secret
  - Authentication details

### 4. **Action Type**
Choose the user interaction type:
- **Submit**: Allows users to submit form responses.
- **Open URL**: Includes a button that opens a web page or external link.

### 5. **Custom Message Card Template**
Design your card using:
- **Text fields**
- **Buttons**
- **Dropdowns**
- **Layout/styling options**  
This enables highly customized, branded messages.

![ :( Can't load image ](/qdocs/Agent_Nodes/Teams_Nodes/Message_Card_Template_Teams/Message_card_template.png)

---

## Output

- This node **sends a card**, but does **not return any output variables**.

---

## When to Use

Use the Message Card Template node when you want to:

- **Collect user input** inside Teams (e.g., surveys, approvals)
- **Send structured data** with clean formatting
- **Include call-to-action buttons** like "Approve" or "View Details"
- **Enhance UX** with styled, branded messages

---

## Example Flow: Collect Feedback via Teams Form

### Scenario
After resolving a user issue, the system sends a feedback form via Teams.

### Flow Steps

1. **User Reports an Issue**  
   - Triggered via Teams message.

2. **Issue Handled Automatically**  
   - A ticket is created, worked on, and marked as resolved.

3. **Send Feedback Form**  
   - **Node**: Message Card Template  
   - **Action Type**: Submit  
   - **Card Content**:
     - _"How satisfied are you with the resolution?"_
     - Options: "Very Satisfied", "Neutral", "Not Satisfied"

4. **Capture Response**  
   - A follow-up node processes the user's selection.

![ :( Can't load image ](/qdocs/Agent_Nodes/Teams_Nodes/Message_Card_Template_Teams/template_example.png)

---

## Summary of the Flow

- The system finishes resolving an issue.
- A **custom Teams message card** is sent for feedback.
- The user responds directly within Teams.
- The workflow continues based on their response.
