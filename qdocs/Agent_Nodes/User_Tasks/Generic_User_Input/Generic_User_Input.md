### Node Guide: Generic User Input

---

### Overview
The **Generic User Input** node allows your workflow to pause and wait for user input during execution. This is useful for gathering information from users in real time and resuming the flow once data is received.

---

### What This Node Does
- Stops the flow at this point until user input is received  
- Captures one or more inputs and stores them in specified variables  
- Can be configured to wait indefinitely or for a custom time duration  

---

### Configuration Details

#### 1. Inputs to Capture
You can define multiple fields to collect from the user.  
For each input, specify:

- **Key/Label**: The prompt or field name shown to the user  
- **Variable**: Choose a variable (from the dropdown list) to store the user response  

#### 2. Timeout Settings

**Default Mode**  
- The flow pauses until the user provides input  
- There is no time limit  

**Custom Timeout Mode**  
- You can specify a timeout period (after which the node proceeds or fails)  

**Format:**  
- **Number** (e.g., 15, 60, 120)  
- **Unit** (Seconds, Minutes, Hours, Days)  
- **Examples:** 45 seconds, 3 hours, 2 days  

---

![ :( Can't load image ](/qdocs/Agent_Nodes/User_Tasks/Generic_User_Input/Generic_User_Input_Node_Image_1.png)

### Inputs
- No direct input required  
- Waits for user interaction to provide inputs  

---

### Outputs
- Each input provided by the user is stored in its mapped variable  
- Once the input is received (or timeout occurs), the flow resumes  

---

### When to Use
Use this node when you need to:

- Collect user feedback or responses during a conversation  
- Wait for user confirmation before proceeding  
- Accept user data like name, email, reason, etc. dynamically  
- Pause the flow until user performs an action  

---

### Example Use Case

#### Scenario: Asking User for Contact Information

**Inputs:**
- Name → store in variable `user_name`  
- Email → store in variable `user_email`  
- Phone → store in variable `user_phone`  

**Timeout Setting:**
- Mode: Custom Timeout  
- Duration: 10 minutes  

> The flow will pause, show the prompt, wait up to 10 minutes for user input, and then proceed.

---

### Summary
The **Generic User Input** node is essential for building interactive, user-driven flows.  
It pauses execution, waits for inputs, and resumes based on dynamic user actions — all while storing responses in predefined variables.

Let me know if you want a version with UI layout guidance for how the inputs appear to the user.