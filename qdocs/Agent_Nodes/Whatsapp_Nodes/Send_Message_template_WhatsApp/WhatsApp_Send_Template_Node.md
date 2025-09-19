# WhatsApp Send Message Template Node

## Overview
The **WhatsApp Send Message Template** node enables your agent to send a pre-approved WhatsApp template message to the user.  
This is especially useful for scenarios where you need to send structured, form-like messages — for example, confirmations, reminders, or notifications with placeholders for dynamic content.

---

## Inputs

1. **Template Name** – The name of the WhatsApp template. Can be directly typed or referenced from a variable.
2. **Template Language** – The language code for the template (e.g., `en`, `en_US`). Can be typed or referenced from a variable.
3. **Template Header** – Optional header text for the template. Can be typed or referenced from a variable.
4. **Header Variable** – Variables to replace placeholders in the template header. Can be typed or referenced from a variable.
5. **Body Variable** – Variables to replace placeholders in the template body. Can be typed or referenced from a variable.
6. **Flow Present** – Radio button to specify if a flow is included (`Yes` or `No`).

![ :( Can't load image ](/qdocs/Agent_Nodes/Whatsapp_Nodes/Send_Message_template_WhatsApp/whatsapp_template.png)

---

## Configuration

1. **WhatsApp Configuration** – Select an existing WhatsApp configuration from the **Global Config** list.  
   You must first create this configuration in the **Global Config** section before using this node.

---

## How It Works
1. The node takes the specified **Template Name** and **Template Language**.
2. Optional **Header** and **Body** variables can be dynamically inserted into placeholders in the template.
3. If **Flow Present** is set to **Yes**, the template can include interactive flows.
4. The selected **WhatsApp Configuration** handles the actual message delivery.

---

## Example Usage

**Scenario:**  
A travel agency wants to confirm a booking via WhatsApp using a pre-approved template.

- **Template Name:** `booking_confirmation`
- **Template Language:** `en`
- **Template Header:** `Booking Details`
- **Header Variable:** `John Doe`
- **Body Variable:** `Paris`, `15th Aug 2025`
- **Flow Present:** `No`
- **WhatsApp Configuration:** `TravelAgencyWAConfig`

**Resulting message:**
> **Booking Details**  
> Hello John Doe, your booking to Paris on 15th Aug 2025 is confirmed.

---

## Notes
- Ensure that the WhatsApp template you use is already **approved** by WhatsApp.
- Variables in the template must match the placeholders defined in your approved template.
- The **WhatsApp Configuration** must be set up in **Global Config** before use.

---
