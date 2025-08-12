# Node Guide: Parallel

## Overview

The **Parallel** node is used to execute multiple branches of a workflow **simultaneously**. Unlike standard nodes that pass control to a single next step, the Parallel node triggers **all connected nodes at once**, allowing independent tasks to proceed concurrently.

This is especially useful when actions don’t depend on each other and can run in parallel to **save time** and **increase efficiency**.

---

## How It Works

When this node executes:

- All connected nodes are triggered at the same time.
- Each connected node runs **independently**.
- No waiting or sequencing—execution happens **in parallel**.
- No configuration is required—just connect downstream nodes.

---

## Configuration Details

### No Configuration Needed

- Simply connect this node to **two or more other nodes**.
- All branches will execute concurrently when the flow reaches this node.
- There are no conditions, inputs, or variables to define.

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/Parallel/Parallel_Node_Image_1.png)

---

## Inputs

- **None**  
  The Parallel node does not accept or use any input variables.

---

## Outputs

- **Flow Control Only**  
  It does **not output any variables**.
  It simply causes all connected nodes to execute **in parallel**.

---

## When to Use

Use the Parallel node when:

- You want to run **multiple independent tasks** at once.
- The connected actions **do not depend on each other’s outputs**.
- You want to **reduce processing time** by avoiding sequential execution.
- You’re sending multiple notifications, saving records, or triggering external systems simultaneously.

---

## Example Flow: Post-Ticket Actions in Parallel

### Scenario

After a support ticket is created, several tasks need to happen:

- Notify the user by email
- Notify the support team on Microsoft Teams
- Save the ticket to a database

These can all be done **in parallel**.

### Flow Steps

1. **Create Ticket**  
   Store ticket details in variables.

2. **Parallel Node**  
   Connect this node to:
   - **Send Email Node**
   - **Send Teams Message Node**
   - **Save to Database Node**

3. **All Run Together**  
   Once the Parallel node is reached, all three nodes execute **simultaneously**.

---

## Summary

- The Parallel node allows **concurrent execution** of multiple branches.
- It simplifies workflows where tasks can happen **at the same time**.
- Ideal for fast, efficient, and **non-blocking** process automation.