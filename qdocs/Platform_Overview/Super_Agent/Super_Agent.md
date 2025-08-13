# Overview

The **Super Agent** serves as an intelligent orchestrator for chatbot, voicebot, WhatsApp bot, and Teams bot applications. It uses a combination of:

- Previous message context  
- Agent capabilities  
- Few-shot training examples  
- Configured policies (greetings, violation handling)  

...to dynamically determine **which specialized agent** should handle each user message or **how to respond directly** based on the context and configuration.

---

# Step-by-Step Setup Guide

Follow these steps to configure your Super Agent using the platform's UI.

---

## Step 1: Redirect to Super Agent Section

1. Navigate to your application interface
2. Click on the **Super Agent** tab
3. Configure the basic messaging:
   - **Fallback message**: Used when no agent can be confidently selected
   - **Greeting message**: Used when users send greetings like "hi" or "hello"

 *Refer to this image:*  
![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_1.png)

---

## Step 2: Select the LLM Model Configuration

Select your **Model Global Configuration** to determine which **Large Language Model (LLM)** the Super Agent will use for processing messages and making routing decisions.

**Key considerations:**
- **For VoiceBots**: Select a realtime model with transcription capabilities for optimal voice processing
- **For ChatBots**: Choose a multi-turn conversational model that excels at text-based interactions
- **For WhatsApp/Teams Bots**: Opt for models with strong contextual understanding and quick response times
- Ensure the model supports **few-shot prompting**
- Verify it can handle adequate **context length** for memory and multi-turn conversations
- Choose a model optimized for conversational task routing and interpretation

---

## Step 3: Set Memory Size

- **Memory Limit**: Define how many previous user-bot message pairs should be passed to the model as context.
- A larger memory window improves understanding of ongoing conversation context for better agent orchestration.

---

### Step 4: Application-Specific Settings

#### WhatsApp Configuration

In the **WhatsApp configuration section**, provide:

- **WhatsApp Global Config**: Select your existing WhatsApp Global Configuration
- **Message on Inactivity**: Message sent when a conversation becomes inactive
- **Active Timeout (ms)**: Duration in milliseconds for which a session remains active after the user's last message
- **WhatsApp Webhook Endpoint**: The endpoint that receives incoming WhatsApp messages and triggers the Super Agent. Copy this URL and configure it in your WhatsApp Business settings on the Meta Cloud API

![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_2.png)


#### Teams Configuration

In the **Teams Configuration section**, provide:

- **Teams Global Config**: Select your existing Teams Global Configuration
- **Teams bot Endpoint**: The endpoint that receives incoming Teams messages and triggers the Super Agent. Copy this URL and configure it in your Azure bot configuration, in Manifest section.

![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_3.png)

#### VoiceBot Configuration

In the **Voice configuration section**, provide:

- **Voice Name**: Specify the voice name compatible with your selected LLM model (e.g., "alloy" for OpenAI)
- **Waiting Message**: Define the message your voicebot should say while fetching data or processing requests

![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_4.png)

---

## Step 5: Set Violation Guardrails

Enable and customize **guardrails** to detect and filter unwanted or unsafe inputs.

- Enable or disable filters such as:
  - Malicious content
  - PII (Personally Identifiable Information)
  - Profanity
  - Hate speech
- Add custom violations topics or delete preset violation topics as per the need of the application
- Add custom instructions for the model to follow when detecting violations
- Set **violation fallback message** that will be returned when such input is detected.

![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_5.png)

---

## Step 6: Connect Agents and Assign Few-Shot Examples

Connect the agents you want the Super Agent to consider when making routing decisions.

For each agent:
- Connect the agent from the dropdown
  
![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_6.png)

- Define its **capabilities** clearly
- Assign few-shot examples to help the Super Agent understand when to use this agent.

![Image](/qdocs/Platform_Overview/Super_Agent/Super_Agent_7.png)

---

# Behavior Summary

| Scenario                                 | What Happens                                                    |
|------------------------------------------|-----------------------------------------------------------------|
| User sends a greeting                    | Responds with the configured **greeting message**               |
| User asks about a generic service        | Routes to the appropriate **service_info_agent**                |
| User reports a technical issue           | Routes to the **support_agent**                                 |
| User asks general FAQs                   | Routes to the **faq_agent**                                     |
| User sends an unsafe/policy-violating message | Responds with the **violation fallback message**            |
| User message doesn't match any agent     | Responds with the **fallback message**                          |

---

# Related Documents

- Global Configuration Guide
- Tutorials
