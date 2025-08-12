# Node Guide: Send SMTP E-Mail

## Overview
This node is used to send an email using SMTP (Simple Mail Transfer Protocol). It allows you to send messages to one or more email addresses with optional CC, BCC, subject, body, and attachments.  
This node is typically used at the end of a process when an email needs to be sent out automatically.

## How it works
When this node runs, it takes the provided email details and sends an email to the specified recipient(s) using the configured SMTP settings.  
There is no output from this node—it performs the action of sending the email and then moves on.

## What You Need to Configure

### Recipient Email Address (To)
The main person you want to send the email to.  
You can enter the email address directly or pass it using a variable from earlier in the workflow.

### CC (Optional)
Add email addresses here if you want others to receive a copy of the email.  
Can be manually typed or passed as a variable.

### BCC (Optional)
Add hidden recipients here. Like CC, these can also be entered manually or through a variable.

### Subject
The title or subject line of the email.  
Can be fixed text or dynamic content from earlier steps.

### Body
The main message of the email.  
You can write this directly or use values from previous steps in the workflow.

### Attachments (Optional)
If you want to attach any files, provide the file IDs from the document management system (DMS).  
These can be added manually or passed as a variable.

### SMTP Configuration
This is a predefined setup that includes the server and authentication details required to send emails.  
You must select an existing SMTP configuration that has already been created in the system's Global Configurations.

## What this node returns
This node does not return any data. Its only function is to send the email.

![ :( Can't load image ](/qdocs/Agent_Nodes/Email_Nodes/Send_SMTP_Email/smtp.png)

## When to use this node
Use this node whenever your workflow needs to send out an email.  
It could be a notification, a summary, an update, or any other type of message.  
Place it where the workflow reaches a point that requires communication via email.

## Real-Time Example Flow: Sending a Job Offer Email to a Candidate

### Scenario
A candidate has cleared all interview rounds. Once the final status is marked as "Selected" in the system, an offer letter needs to be sent automatically.

### Flow Steps

**1. Status Check**  
Trigger the flow when a candidate’s status is updated to "Selected".

**2. Fetch Candidate Info**  
Get candidate’s name and email address from the database.

**3. Generate Offer Email**  
Create the email subject and body using candidate details.

**4. Send SMTP E-Mail**  
Send the job offer email with the offer letter attached.

### Quick Explanation
- The system sees that the candidate is selected.  
- It pulls their email and name.  
- It prepares an email like:  
  - **Subject:** "Congratulations – You're Selected!"  
  - **Body:** "Dear Rahul, we're pleased to offer you a position at our company..."  
- It sends the email automatically using the Send SMTP E-Mail node.  
- No manual effort needed. The candidate receives the offer instantly.