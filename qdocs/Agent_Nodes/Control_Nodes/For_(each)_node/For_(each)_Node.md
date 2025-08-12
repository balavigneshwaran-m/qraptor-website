# Node Guide: For (each) Node

## Overview

The **For (each) Node** is used to **repeat** a section of your workflow **for every item in a list**.  
It acts like a `forEach` loop in programming—allowing you to apply the same logic to every element, one by one.

This is especially useful for:
- Sending messages to multiple users
- Processing a list of tickets, tasks, or records
- Automating actions over any list-based data

---

## How It Works

When this node executes:

- It reads a **list variable** (array of items)
- It **loops through each item**, executing the connected path once per item
- Each loop runs **sequentially**, not in parallel
- Each item is handled **individually**

---

## Configuration Details

### List Variable Selection

Choose the variable that contains the list you want to iterate over.  
Supported list types include:

- **Strings** (e.g., `["alice@example.com", "bob@example.com"]`)
- **Numbers** (e.g., `[1, 2, 3]`)
- **Objects** (e.g., `[{id: 1}, {id: 2}]`)

No additional setup is required beyond selecting the list variable.

![ :( Can't load image ](/qdocs/Agent_Nodes/Control_Nodes/For_(each)_node/For_(each)_node_Image_1.png)

---

## Inputs

- **Input Variable**:  
  The list or array that will be looped through (e.g., `userList`, `ticketArray`, etc.)

---

## Outputs

- **Flow Control Only**:  
  Executes connected nodes once per item.  
  Does **not** produce or return a variable by default.

---

## When to Use

Use the **For (each) Node** when:

- You have a **list** of items to process one-by-one
- Each item requires the **same logic or action**
- You want a clean way to automate batch operations

---

## Example Flow: Send Email to Multiple Users

### Scenario

You have a list of email addresses and want to send a custom message to each one.

### Flow Steps

1. **Fetch User List**  
   Save all email addresses in a variable called `userList`.

2. **For (each) Node**  
   - Select `userList` as the input list

3. **Send Email Node**  
   - Use the current list item as the email recipient

4. **Loop Continues**  
   - Each email is sent one after another until the list is exhausted

---

## Summary

- Reads a **list** from a variable
- Repeats the flow **once per list item**
- Perfect for batch operations
- Simplifies repetitive logic and improves scalability