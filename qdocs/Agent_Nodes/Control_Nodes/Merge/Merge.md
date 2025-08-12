# Node Guide: Merge

## Overview

The **Merge** node is used to bring multiple branches of a workflow back together into a **single unified path**. It ensures that **all connected nodes** have finished executing before proceeding.

This is especially useful after **Parallel** or **conditional branches** where you want the workflow to continue only after **all actions are complete**.

---

## How It Works

When this node executes:

- It **waits for all incoming paths** to complete.
- Once all connected nodes finish, it **merges the flow** and triggers the next node.
- It does **not process or transform data**—it simply controls the execution flow.

---

## Configuration Details

### No Configuration Needed

- Just connect **two or more nodes** to the Merge node.
- It automatically handles synchronization.
- No variables, inputs, or conditions are required.

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/Merge/Merge_Node_Image_1.png)

---

## Inputs

- **No direct data inputs**  
  The Merge node listens for **execution signals** from upstream nodes, not variables.

---

## Outputs

- **Flow Control Only**  
  Once all branches complete, the Merge node triggers the **next node**.
  No output variables are produced.

---

## When to Use

Use the Merge node when:

- You have multiple actions (like email, logging, updates) that run in parallel or conditionally.
- You need to **wait for all branches** to complete before continuing.
- You want a **single path forward** after multiple processes complete.
- You are combining **Parallel** and **Sequential** logic in the same workflow.

---

## Example Flow: Wait for Notifications to Complete

### Scenario

After resolving a ticket, you want to:

- Notify the user via **email**
- Notify the support team on **Microsoft Teams**
- **Log the ticket** as closed only after both messages are sent

### Flow Steps

1. **Ticket Resolved**
2. **Parallel Node**  
   Triggers:
   - `Send Email`
   - `Send Teams Message`
3. **Merge Node**  
   Waits for both `Send Email` and `Send Teams Message` to complete
4. **Log Ticket Closure**  
   Executes only after both notifications are done

---

## Summary

- The Merge node is a **synchronization point** in your workflow.
- It ensures **all connected branches finish** before moving forward.
- Ideal for keeping processes **coordinated and sequential** after parallel execution.