# Node Guide: Condition

## Overview

The **Condition** node enables **flow control** in your workflow, much like an `if-else` statement in programming. It evaluates one or more variables against specified conditions and routes the workflow accordingly.

This allows you to build **dynamic, decision-based flows** where the next action depends on variable values or prior results.

---

## How It Works

When this node runs:

- It evaluates variables using the conditions you configure.
- If the condition **passes**, one path of the flow is followed.
- If the condition **fails**, an alternative path is taken.
- The node **does not return any data**—it purely controls flow routing.

---

## Configuration Details

### 1. **Choose Condition Logic**
Choose how multiple conditions should be evaluated:

- **AND**: All conditions must be true.
- **OR**: At least one condition must be true.

### 2. **Define Conditions**
You can create logical comparisons:

- Variable → Fixed value  
  _Example_: `status == "approved"`  
- Variable → Another variable  
  _Example_: `userType == userGroup`  
- Numeric comparison:  
  _Example_: `score >= 75`

Supported operators include:  
`==`, `!=`, `>`, `<`, `>=`, `<=`

### 3. **Define Edges (Paths)**
Connect the Condition node to other nodes based on the evaluation result:

- **Success Edge**: The path followed when the condition is **true**.
- **Failure Edge**: The path followed when the condition is **false**.

Label edges clearly for readability (e.g., `True Path`, `False Path`, `Approved`, `Rejected`).

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/Condition/Condition_Node_Image_1.png)

---

## Inputs

- **Variables**: These are the inputs evaluated against your condition logic.

---

## Outputs

- **Flow Control Only**:  
  This node does **not return any variable or output data**.  
  It only controls which **next node** gets executed.

---

## When to Use

Use the Condition node when you want your workflow to:

- Take different paths based on input or response data
- Make branching decisions using system-generated or user-submitted values
- Check for specific statuses or flags (e.g., "approved", "error", "VIP")
- Implement logic similar to `if`, `else if`, and `else` blocks

---

## Example Flow: Check Ticket Priority Before Escalation

### Scenario

You want to evaluate the **priority** of a ticket and take different actions based on whether it’s marked as **"High"** or not.

### Flow Steps

1. **Create Ticket**  
   The ticket is created and stored in a variable (`priority`).

2. **Condition Node**  

   - Condition:  priority == "High"
   - Success Edge → Send Escalation Email
   - Failure Edge → Log Ticket in System

### Summary
The Condition node checks logical expressions using variables.
Based on the result, it directs the workflow down a different path.
It enables flexible, intelligent flow design through branching logic.