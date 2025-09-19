# Bar Chart
 
The **Bar Chart** allows users to compare numeric values across categories. It’s ideal for dashboards displaying metrics like stock counts, attendance, or revenue by group.
 
---
 
> ![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Bar_Chart/bar_chart_1.png)
> *Bar Chart component added to the canvas.*
 
---
 
## Where to Find
 
The Bar Chart is available in the **Dashboard Components** section. Drag and drop it into the canvas to get started.

> *Bar Chart listed under Dashboard Components.*
 
---
 
## Style Configuration
 
Tweak its layout and appearance via the **Style** tab:
 
| Property       | Description                                 | Example          |
|----------------|---------------------------------------------|------------------|
| **Width**      | Width of the chart                          | `100%`, `300px`  |
| **Height**     | Height of the chart                         | `100px`, `400px` |
| **Background** | Background color of the chart               | `#FFFFFF`        |
| **CSS Class**  | Custom class for applying extra styles      | `my-bar-chart`   |

> *Style section where Bar Chart dimensions and background can be adjusted.*
 
---
 
## Property Configuration
 
| Property        | Description |
|-----------------|-------------|
| **Label**       | Title of the chart (editable by user). |
| **Variable**    | Variable to bind data dynamically. Choose from created variables. |
| **Select Agent**| Choose an agent whose output is mapped to the selected variable. |
 
![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Bar_Chart/bar_chart_2.png)
> *Configuring label, data variable, and agent source for Bar Chart.*
 
---
 
## Data Binding Instructions
 
1. **Define a Variable** in the Variable section.  
2. **Bind Variable** in the chart’s Property tab.  
3. **Configure Agent** that fetches the data. Ensure its output is mapped to the variable.

> *Step-by-step to bind agent output to Bar Chart variable.*
 
---
 
## Preview Chart
 
On drop, the Bar Chart shows placeholder data:
 
- **X-axis**: Days of the week (`M` to `Today`)
- **Y-axis**: Stock values like `[8, 12, 7, 5, 11.23, 9, 7]`
 
This temporary chart is replaced once a valid variable is assigned.
 
---
 
## Summary
 
- Best for comparing category-wise values.  
- Simple styling options: width, height, background.  
- Dynamically driven by agent-connected variable.  
- Default preview data helps visualize during setup.