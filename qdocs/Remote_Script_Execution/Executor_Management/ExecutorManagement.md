# Executors Management

The Executors Management module allows you to manage executors within your subscription. Users can view the list of executors, add new ones, and inspect detailed information such as credentials and type.

---

## 1. Viewing Executors

- Navigate to the **Executors Management** tab.  
- Executors are displayed in a table with the following details:

  - UUID  
  - Name  
  - Description  
  - Type  
  - Auth URL
  - Modified On  
  - Modified By  
  - Active Status  

- The **Actions** column provides quick actions such as **View**.  

![alt text](/qdocs/Remote_Script_Execution/Executor_Management/executors.png)

---

## 2. Adding an Executor

- Click the **Add Executor** button.  
- A dialog will appear with the following fields:  

  - **Name** (required)  
  - **Description** (optional)  
  - **Type** (required — dropdown, currently supports **Python**)  

- Click **Save** to create the executor.  
- Once created, the system will generate unique values for:  

  - **UUID**  
  - **Client ID**  
  - **Client Secret**  

![alt text](/qdocs/Remote_Script_Execution/Executor_Management/add-executor.png)

ℹ️ **Note:** These generated values (UUID, Client ID, Client Secret) are required when configuring your **q-remotex** (Python remote executor container).  
For more details, refer to the [Docker Hub page](https://hub.docker.com/r/qraptor/q-remotex) of q-remotex.

---

## 3. Viewing Executor Details

- Click the **View** icon next to an executor in the list.  
- A dialog will open displaying full details:

  - UUID  
  - Name  
  - Description  
  - Type
  - Auth URL  
  - Modified On  
  - Modified By  
  - Active Status  

- Additionally, credentials are shown:
  - **Client ID**  
  - **Client Secret** (hidden by default, toggle visibility using the 👁️ icon)  

![alt text](/qdocs/Remote_Script_Execution/Executor_Management/view-executor.png)

---

## 4. Summary & Highlights

- Executors are listed in a structured table with pagination.  
- New executors can be added via a dialog form.  
- System automatically generates `UUID`, `Client ID`, and `Client Secret`.  
- Executor details (including credentials) can be viewed securely.  
- Active status is displayed with visual indicators (✅ Yes / ❌ No).  
