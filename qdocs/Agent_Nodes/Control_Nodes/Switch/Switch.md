# Node Guide: Switch

## Overview

The **Switch** node allows you to route your workflow based on the **value of a variable**, similar to a `switch-case` structure in programming.

Each outgoing path (or **edge**) can have its own condition, and only the one that matches will be followed. This helps you manage **multiple outcomes** efficiently—without long, nested condition blocks.

---

## How It Works

When the node runs:

- It reads the value(s) from one or more variables.
- Each connected edge has its own condition (e.g., `status == "Open"`).
- The node checks each edge in order.
- The first **matching condition** is executed.
- If no match is found, a **default edge** (if configured) is used.

---

## Configuration Details

### 1. **Choose Condition Type**

Determine how multiple conditions are evaluated **per edge**:

- **AND**: All conditions on an edge must be true.
- **OR**: At least one condition on an edge must be true.

### 2. **Set Conditions for Each Edge**

Each outgoing connection (edge) can have its own condition:

**Example:**
- Edge A: `status == "Open"`
- Edge B: `status == "Closed"`
- Edge C: `status == "Pending"`

Conditions can be:
- Variable → Constant  
  _e.g._: `ticketStatus == "Resolved"`
- Variable → Variable  
  _e.g._: `currentLevel == escalationLevel`

### 3. **Configure Default Edge (Optional)**

If no condition matches, you can configure a fallback path:

- Default edge ensures flow **doesn't break** if values are unexpected.
- Useful for error handling or logging unknown states.

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/Switch/Switch_Node_Image_1.png)

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/Switch/Switch_Node_Image_2.png)

---

## Inputs

- **Variables Only**: Input variables used in the condition expressions.

---

## Outputs

- **Flow Control Only**:  
  The node does **not produce output variables**.
  It only determines which next node should be executed.

---

## When to Use

Use the Switch node when:

- You need to check a variable against **multiple possible values**
- You want to avoid **multiple nested condition nodes**
- You’re building workflows with **3 or more branches**
- You want **clean, readable branching logic**

---

## Example Flow: Handle Ticket Status with Different Actions

### Scenario

A support ticket enters the system. Based on the ticket’s **status**, a different action should occur.

### Flow Steps

1. **Receive Ticket Info**  
   Variable: `ticketStatus`

2. **Switch Node**
   - Edge A: `ticketStatus == "New"`  
     → Send welcome message
   - Edge B: `ticketStatus == "In Progress"`  
     → Notify support team
   - Edge C: `ticketStatus == "Resolved"`  
     → Send resolution summary
   - **Default**: Log status as "Unknown"

3. **Flow Continues**  
   Only one edge executes based on the condition.  
   If none match, the default path is taken.

---

## Summary

- The **Switch** node checks a variable against **multiple conditions**.
- It routes the flow to the **first matching path**.
- Offers **clear logic and simplified branching** for multi-outcome flows.