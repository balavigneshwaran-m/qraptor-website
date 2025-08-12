#  Line Chart
 
The **Line Chart** component allows users to visually represent trends and patterns in data over time or across categories. It is ideal for analytical dashboards, performance monitoring, and data-driven storytelling.
 
---
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Line_Chart/line_chart_1.png)
> *Line Chart component dropped into the design canvas.*
 
---
 
##  Component Purpose
 
The Line Chart is used to display a smooth line graph that helps users interpret time-series or category-based numerical data. It provides a clean and modern visualization, enabling data analysis at a glance.
 
---
 
##  Where to Find
 
You can find the Line Chart in the **Dashboard Components** section of the component inventory. Simply drag and drop it onto the canvas to begin configuration.
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Line_Chart/line_chart_2.png)  
> *Line Chart listed under Dashboard Components.*
 
---
 
## Style Configuration
 
Users can visually customize the Line Chart using the **Style** section. These options allow for layout and appearance adjustments:
 
| Property        | Description                                 | Example                |
|-----------------|---------------------------------------------|------------------------|
| **Width**       | Width of the chart container                | `100%`, `300px`        |
| **Height**      | Height of the chart container               | `100px`, `400px`       |
| **Background**  | Background color of the chart               | `#FFFFFF`              |
| **CSS Class**   | Custom CSS class name for additional styles | `custom-line-chart`    |
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Line_Chart/line_chart_3.png)
> *Style section where chart dimensions and background can be adjusted.*
 
---
 
## Property Configuration
 
The **Properties** section defines the behavior, label, data source, and dynamic binding logic.
 
| Property        | Description |
|-----------------|-------------|
| **Label**       | Title text shown above the chart. Can be customized by the user. |
| **Variable**    | A required field for dynamic data binding. It must be created first in the variable section and then selected from the dropdown. The chart uses this variable to display data dynamically. |
| **Select Agent**| Enables users to connect an agent that provides the data. The agent's output must be mapped to the selected variable for live data to appear in the chart. |

 ![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Line_Chart/line_chart_4.png) 
> *Properties section showing label, variable, and agent configuration.*
 
---
 
## Data Binding Logic
 
Line Chart uses a **variable-based data binding mechanism**. Here’s how users can bind dynamic data:
 
1. **Create a Variable**: Go to the **Variable Section** and define a variable (e.g., `salesData`).
2. **Map Variable to Chart**: In the Line Chart’s properties, select the variable from the dropdown.
3. **Connect an Agent**: Select an agent whose output corresponds to the variable. Make sure the agent's output key is mapped to the same variable.
 
> ![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Line_Chart/line_chart_5.png)
> *Example showing how to create and assign a variable for data binding.*
 
---
 
## Preview Behavior
 
While designing, a **default preview dataset** is shown to help visualize the component. This placeholder includes:
 
- X-axis: `['M', 'T', 'W', 'T', 'F', 'S', 'Today']`
- Y-axis: `[8, 12, 7, 5, 11.232, 9, 7]`
 
This is only for UI preview and does not represent live data. To show actual values, users must bind a variable that receives agent output.
 
---
 
## Summary
 
- Enables intuitive visualization of numeric trends.
- Fully configurable styling: width, height, background color, and CSS class.
- Integrates with agent output using variable binding.
- Shows placeholder data during design for better visual feedback.
 
> ![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Line_Chart/line_chart_6.png)
> *Line Chart as it appears in the final application interface.*