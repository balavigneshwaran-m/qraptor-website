# Node Guide: Read IMAP E-Mail

## Overview
The Read IMAP E-Mail node is used to connect to an email inbox and fetch emails based on specific criteria.  
This node is useful when your workflow needs to check for new messages, process email data, or monitor incoming communication.  
It works with an IMAP configuration, allowing you to search emails by sender, subject, date range, and more.

## How It Works
When this node runs:

- It connects to the mailbox using the provided IMAP configuration.
- It searches for emails based on the input filters.
- It fetches matching emails up to the defined limit.
- It returns the emails and total count as output variables.

## What You Need to Configure

### 1. Sender Email Address  
Specify the email address from which you want to fetch emails.  
(You can type this manually or pass it dynamically through a variable.)

### 2. Subject  
Filter emails based on their subject line.  
(Supports manual entry or variable-based input.)

### 3. Fetch Limit  
Set the maximum number of emails you want to retrieve.  
(Useful to avoid fetching a large number of messages at once.)

### 4. Date Since  
Specify the start date from which emails should be fetched.  
(Example: fetch emails from the last 7 days.)

### 5. Date Before  
Specify the end date before which emails should be fetched.  
(Helps narrow down results within a date range.)

### 6. Mark as Read  
If checked, the emails fetched will be marked as read in the mailbox.

### 7. Fetch Only Unseen  
If checked, only unread (unseen) emails will be fetched.

### 8. IMAP Configuration  
Choose from the predefined IMAP configurations available in Global Configurations.  
This setup includes mailbox credentials and server details.

![ :( Can't load image ](/qdocs/Agent_Nodes/Email_Nodes/Read_IMAP_Email/read_IMAP.png)

## Output

This node provides two outputs:

### List of Emails  
A collection of email objects that match the criteria.  
This includes content like subject, sender, body, attachments, etc.

### Email Count  
The total number of emails retrieved during this operation.

These outputs can be used in the next steps of the workflow—for filtering, parsing, decision-making, or forwarding.

![ :( Can't load image ](/qdocs/Agent_Nodes/Email_Nodes/Read_IMAP_Email/read_IMAP_output.png)

## When to Use

Use the Read IMAP E-Mail node when your workflow needs to:

- Monitor a mailbox for new or unread messages
- Read and analyze emails from a specific sender or with a specific subject
- Pull attachments or content for further processing
- Integrate email-based triggers into your automation

## Example Flow: Process Support Emails Automatically

### Scenario
A company has a shared support mailbox. Whenever a new email comes in with the subject “Login Issue”, it should be read, counted, and processed automatically.

### Flow Steps

**Scheduled Trigger**  
The flow runs every 15 minutes.

**Read IMAP E-Mail Node**
- Sender: support@company.com
- Subject: "Login Issue"
- Fetch only unseen emails
- Limit: 10 emails
- Mark emails as read after fetching

**Process Each Email**  
Loop through the list of emails and extract message details or create tickets.

**Log or Notify**  
Use the email count to log how many new issues were received.

## Summary of the Flow

- The system checks the inbox for new, unread messages with a specific subject.
- It fetches up to 10 emails.
- The messages are processed or acted upon.
- Emails are marked as read so they are not picked up again.