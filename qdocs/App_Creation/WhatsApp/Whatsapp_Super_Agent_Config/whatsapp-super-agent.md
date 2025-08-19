"# Overview

The *Super Agent* serves as an intelligent orchestrator for chatbot, voicebot, WhatsApp bot, and Teams bot applications. It uses a combination of:

- Previous message context  
- Agent capabilities  
- Few-shot training examples  
- Configured policies (greetings, violation handling)  

...to dynamically determine *which specialized agent* should handle each user message or *how to respond directly* based on the context and configuration.

---

# Step-by-Step Setup Guide

Follow these steps to configure your Super Agent using the platform's UI.

---

## Step 1: Redirect to Super Agent Section

1. Navigate to your application interface
2. Click on the *Super Agent* tab
3. Configure the basic messaging:
   - *Fallback message*: Used when no agent can be confidently selected
   - *Greeting message*: Used when users send greetings like "hi" or "hello"

 Refer to this image:  
![Super Agent Entry](/qdocs/App_Creation/WhatsApp/Whatsapp_Super_Agent_Config/whatsapp_super_agent_Image_1.png)

---

## Step 2: Select the LLM Model Configuration

Select your *Model Global Configuration* to determine which *Large Language Model (LLM)* the Super Agent will use for processing messages and making routing decisions.

*Key considerations:*
- *For VoiceBots*: Select a realtime model with transcription capabilities for optimal voice processing
- *For ChatBots*: Choose a multi-turn conversational model that excels at text-based interactions
- *For WhatsApp/Teams Bots*: Opt for models with strong contextual understanding and quick response times
- Ensure the model supports *few-shot prompting*
- Verify it can handle adequate *context length* for memory and multi-turn conversations
- Choose a model optimized for conversational task routing and interpretation

---

## Step 3: Set Memory Size

- *Memory Limit*: Define how many previous user-bot message pairs should be passed to the model as context.
- A larger memory window improves understanding of ongoing conversation context for better agent orchestration.

---

### Step 4: Application-Specific Settings

#### WhatsApp Configuration

Pre-requisites:
- Ensure you have a WhatsApp Business account set up with the Meta Cloud API
- Ensure you have a WhatsApp Business number configured
- Ensure you have a App created in the Meta Developer Portal with WhastApp added as a product and intgerated with you business number and portfolio
You can refer to the [WhatsApp Business API documentation](https://developers.facebook.com/docs/whatsapp/cloud-api/get-started) for more details.
- Ensure you have a WhatsApp Global Configuration created in the platform


In the *WhatsApp configuration section*, provide:

- *WhatsApp Global Config*: Select your existing WhatsApp Global Configuration
- *Message on Inactivity*: Message sent when a conversation becomes inactive
- *Active Timeout (ms)*: Duration in milliseconds for which a session remains active after the user's last message
- *WhatsApp Webhook Endpoint*: The endpoint that receives incoming WhatsApp messages and triggers the Super Agent. Copy this URL and configure it in your WhatsApp Business settings on the Meta Cloud API

![WhatsApp Configuration](/qdocs/App_Creation/WhatsApp/Whatsapp_Super_Agent_Config/whatsapp_super_agent_Image_2.png)

- *Webhook Configuration*: Configure the webhook in the Meta Cloud API to point to the endpoint provided above. This allows WhatsApp to send incoming messages to your Super Agent. You can find the webhook configuration in the Meta Cloud API in the left navigation panel under the "WhatsApp -> Configuartion" section. Ensure you set the correct callback URL and subscribe to the necessary events like `messages` and `message_reactions`.

- The verification token is used to verify the webhook endpoint. You can set this in the WhatsApp Global Configuration in the qRaptor platform, and it should match the token configured in the Meta Cloud API.


![Webhook Configuration In Meta Cloud API](/qdocs/App_Creation/WhatsApp/Whatsapp_Super_Agent_Config/meta-config.png)


- The Super Agent will now be able to receive and process incoming WhatsApp messages, route them to the appropriate agents, and respond based on the configured policies and agent capabilities.

- The Super Agent captures the user message and context, determines the appropriate agent to handle the request, it stores the payload in the user_message variable available as a default variable in every agent. 

-In case any document is sent as the message, the Super agent will save the document in the temp folder of the DMS and replace the document id in the payload with the document id.
For example, if the user sends an image, the Super Agent will save the image in the DMS and replace the image_id field in the payload with the document id of the saved image.


---

## Step 5: Set Violation Guardrails

Enable and customize *guardrails* to detect and filter unwanted or unsafe inputs.

- Enable or disable filters such as:
  - Malicious content
  - PII (Personally Identifiable Information)
  - Profanity
  - Hate speech
- Add custom violations topics or delete preset violation topics as per the need of the application
- Add custom instructions for the model to follow when detecting violations
- Set *violation fallback message* that will be returned when such input is detected.
- Add custom violations topics or delete preset violation topics as per the need of the application
- Add custom instructions for the model to follow when detecting violations
- Set *violation fallback message* that will be returned when such input is detected.

![Violation Guardrails](/qdocs/App_Creation/WhatsApp/Whatsapp_Super_Agent_Config/whatsapp_super_agent_Image_3.png)

---

## Step 6: Connect Agents and Assign Few-Shot Examples

Connect the agents you want the Super Agent to consider when making routing decisions.

For each agent:
- Connect the agent from the dropdown
  
![Agent Configuration](/qdocs/App_Creation/WhatsApp/Whatsapp_Super_Agent_Config/whatsapp_super_agent_Image_4.png)

- Define its *capabilities* clearly
- Assign few-shot examples to help the Super Agent understand when to use this agent.

![Agent Configuration](/qdocs/App_Creation/WhatsApp/Whatsapp_Super_Agent_Config/whatsapp_super_agent_Image_5.png)

---

# Behavior Summary

| Scenario                                 | What Happens                                                    |
|------------------------------------------|-----------------------------------------------------------------|
| User sends a greeting                    | Responds with the configured *greeting message*               |
| User asks about a generic service        | Routes to the appropriate *service_info_agent*                |
| User reports a technical issue           | Routes to the *support_agent*                                 |
| User asks general FAQs                   | Routes to the *faq_agent*                                     |
| User sends an unsafe/policy-violating message | Responds with the *violation fallback message*            |
| User message doesn't match any agent     | Responds with the *fallback message*                          |

---

