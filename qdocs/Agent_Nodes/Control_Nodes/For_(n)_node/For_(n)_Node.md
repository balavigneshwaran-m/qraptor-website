# Node Guide: For (n) Node

## Overview

The **For (n) Node** is used to **repeat** a section of your workflow a **fixed number of times**. It works like a simple loop, allowing you to define how many times the branch it connects to should execute.

This is especially useful for:
- Sending reminders
- Retrying failed actions
- Running the same operation multiple times

---

## How It Works

When this node is executed:

- It reads the **iteration count** (either manually provided or from a variable).
- Then, it executes the connected node(s) **repeatedly**, **one iteration at a time**.
- All iterations are run **sequentially**, not in parallel.

---

## Configuration Details

### Iteration Count
You must specify how many times to run the loop. This can be:

- A **manual number** (e.g., `5`)
- A **variable** (e.g., `retryCount`) containing a number

No other setup is required.

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/For_(n)_node/For_(n)_node_Image_1.png)

---

## Inputs

- **Iteration Count**:  
  A numeric value (constant or from a variable) that tells the node how many times to loop.

---

## Outputs

- **Flow Control Only**:  
  Executes the connected nodes `n` times in order.  
  It does **not** return or produce any variable output.

---

## When to Use

Use the **For (n) Node** when:

- You want to repeat an action a **specific number of times**
- The repetition count is **known or stored in a variable**
- Each iteration is **independent** (doesn’t require breaking the loop early)

---

## Example Flow: Retry Notification 3 Times

### Scenario

A user doesn’t respond, so you want to **send a reminder message 3 times**, with a short delay between each.

### Flow Steps

1. **Set Count Variable**  
   Save `3` in a variable called `retryCount`.

2. **For (n) Node**  
   - Input: `retryCount`
   - Connected to: `Send Teams Message` node

3. **Delay Node (Optional)**  
   - Add a wait time (e.g., 5 minutes) before the next reminder

4. **Merge or Continue Flow**  
   - Once all iterations are complete, continue to the next action

---

## Summary

- Reads a **number**
- Runs the **same workflow path** multiple times
- Simple, reliable looping for repetitive tasks