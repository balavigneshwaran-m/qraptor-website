# Remote Script Execution

The **Remote Script Execution** feature extends the script execution capabilities of qRaptor agents by allowing scripts to run outside the qRaptor platform, on user-managed infrastructure. This enables greater flexibility, broader library support, and full control over execution environments.

---

## 1. Overview

The **Remote Script Execution** feature enables qRaptor agents to run scripts on dedicated executors hosted within user-managed infrastructure. Instead of being limited by predefined environments, users can now execute scripts in fully customizable Docker-based executors, with the flexibility to install any dependencies, SDKs, or libraries required for their workflows.

When an AI agent is executed, the platform securely communicates with the configured remote executor. The executor processes the script and streams the results back to the qRaptor platform in real time, ensuring smooth integration within agent workflows.

This approach allows teams to maintain control over the runtime environment, scale execution capacity based on demand, and bring computation closer to their data sources or private networks.

ℹ️ If you wish to run scripts directly within the qRaptor platform (sandboxed execution), refer to the [Script Execution Node documentation](/docs/agent-nodes/automation/script/).

---

## 2. Architecture

The architecture involves four main components:

- **qRaptor Platform – Agent Execution Engine**: The core component responsible for orchestrating and executing AI agents. It manages workflows, delegates tasks like script execution, and integrates results back into the agent runtime.

- **q-RemoteX (Remote Executor)**: A Docker-based Python execution environment running on user-managed infrastructure. It receives execution requests from the platform, processes scripts, and streams results back in real time.

- **Auth Proxy**: Responsible for issuing and validating authentication tokens. Remote executors connect with this proxy to obtain secure credentials before interacting with the platform.

- **q-RemoteXGW (Execution Gateway)**: The gateway service that exposes the qRaptor platform to remote executors. It acts as the secure communication channel between executors and the platform, ensuring reliable message flow.

![q-RemoteX Architecture](/qdocs/Remote_Script_Execution/Overview/remotex.gif)

---

## 3. Key Features

- **Custom Execution Environment**  
  Run scripts on infrastructure you control, with freedom to install any libraries or SDKs.

- **Secure Connectivity**  
  Each executor uses unique credentials (Client ID, Client Secret, Auth URL) for authentication.

- **Scalable Deployment**  
  Multiple executors can be added and managed through the **Executors Management** module.

- **Real-time Streaming**  
  Script results are streamed back to the platform in real time, ensuring responsive feedback.

- **Seamless Integration**  
  Remote execution is integrated into the same agent workflow — simply add a **Remote Script Node** to start using it.

---

## 4. Possibilities

- Execute scripts requiring heavy dependencies or specialized SDKs (e.g., cloud SDKs, ML libraries).
- Host executors close to your data sources or private networks for secure processing.
- Scale execution horizontally by deploying multiple executors in cloud or hybrid setups.
- Enable advanced automation scenarios without being limited by sandbox restrictions.

---

## 5. Summary & Highlights

- Remote Script Execution removes sandbox restrictions by allowing scripts to run on user-managed executors.
- Executors are lightweight Docker containers connected securely to the platform.
- Real-time streaming ensures seamless integration into agent workflows.
- Unlocks advanced possibilities with full control over libraries, environments, and scaling.
