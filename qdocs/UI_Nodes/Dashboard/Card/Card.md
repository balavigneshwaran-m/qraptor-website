# CountCard Component
 
The **CountCard** is a visually rich dashboard component in **AugmentAppz.ai** designed to display dynamic **numeric values**, such as user counts, sales totals, or any other metric that changes over time.
 
It provides a **label**, an **icon**, and a **live number**—all of which can be customized and powered by your application’s logic. This component is ideal for building executive dashboards, summaries, and metric visualizations in your low-code applications.
 
---
 
## Visual Overview
 
> 🪩 **Application Building Area**  
> This is where you build your application using UI elements like CountCard.
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Card/count_card_1.png)
 
---
 
> **Component in Inventory**  
> CountCard as seen in the component library of AugmentAppz.ai.
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Card/count_card_2.png)
 
---
 
> **Dragged CountCard in Canvas**  
> An example of the CountCard dropped into the layout area.

 ![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Card/count_card_3.png)
 
---
 
> **Configuration Panel**  
> The CountCard property panel, where styling and logic can be configured.
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Card/count_card_4.png)
 
---
 
## 🛠 What Can You Do with a CountCard?
 
- **Display Real-Time Metrics**: Such as the number of users, total sales, number of open tickets, etc.
- **Customize the Look**: Change the background color, text color, size, and icon.
- **Bind Data Dynamically**: Show live data by connecting the card to an agent through a variable.
 
---
 
## Component Properties
 
When you click on the CountCard in the design area, you can configure the following properties:
 
### Styling Options
 
| Property            | Description                                                                 |
|---------------------|-----------------------------------------------------------------------------|
| **Width**           | Controls the horizontal size of the card. Default is `100%` of its container. |
| **Height**          | Controls the vertical size. Default is `100%` of its container.             |
| **Text Color**      | Sets the color of the label and number text.                                |
| **Background Color**| Sets the card's background color.                                           |
| **CSS Class**       | (Optional) Apply your own CSS class for advanced customization.             |
 
> *Users can define styles visually or by writing custom CSS.*
 
---
 
### Data & Logic Configuration
 
| Property               | Description                                                                                  |
|------------------------|----------------------------------------------------------------------------------------------|
| **Label**              | Text shown on the card (e.g., "Active Users"). This helps describe the number being shown.   |
| **Icon**               | Choose an icon from the built-in icon library to represent the data visually.                |
| **Variable (v-model)** | Select a **variable** whose value will be displayed in the card. This variable must be created beforehand. |
| **Agent Configuration**| Connect the card to an **agent**. The agent should return a value mapped to the variable you've selected. |
 
---
 
## How to Use CountCard with Dynamic Data
 
To show live, dynamic data in the CountCard:
 
1. **Create a Variable**  
   Go to the **Variable Section**, create a new variable (e.g., `totalUsers`), and save it.
 
2. **Drag and Drop the CountCard**  
   From the **Dashboard component list**, drag the CountCard onto your layout canvas.
 
3. **Configure the Card**  
   - Set a label like `"Total Active Users"`  
   - Pick an icon that matches the label  
   - Choose your variable (e.g., `totalUsers`) in the **Variable dropdown**  
   - Optionally change size and style  
 
4. **Bind an Agent**  
   - Click **"Configure Agent"**  
   - Select or create an agent (e.g., "Get Active Users")  
   - In the agent’s output mapping, link the agent’s response field to the same variable (e.g., map `response.total` → `totalUsers`)  
 
 Now, when the agent is triggered, the `totalUsers` variable updates and your CountCard will display the latest value.
 
---
 
## Pro Tips
 
- You can reuse the **same variable** in multiple UI elements if needed.
- Every **CountCard can be visually different**—use different styles and icons to help users scan your dashboard quickly.
- No code is required, but **advanced users** can add their own styles using custom CSS classes.
 
---
 
## Related Features
 
- [ How to Create and Use Variables](#)
- [ Binding Agents and Outputs](#)
- [ Styling UI Components](#)
 
---
 
>  *The CountCard is ideal for summarizing live agent-driven data in a clear, visual format—all without writing a single line of code.*