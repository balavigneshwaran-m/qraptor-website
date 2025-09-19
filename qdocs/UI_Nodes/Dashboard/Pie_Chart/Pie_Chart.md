# Pie Chart
 
The **Pie Chart** visually represents proportions within a dataset. It is useful for showing how parts contribute to a whole—ideal for metrics like sales breakdowns, demographics, or percentage-based distributions.
 
---
 
> ![ :( Can't load image ](/qdocs/UI_Nodes/Dashboard/Pie_Chart/pie_chart_1.png)
> *Pie Chart component added to the canvas.*
 
---
 
## 🛩 Where to Find
 
You’ll find the Pie Chart in the **Dashboard Components** section of the component inventory. Simply drag and drop it into the design canvas to get started.

> *Pie Chart listed under Dashboard Components.*
 
---
 
## Style Configuration
 
Adjust the layout and appearance using the **Style** tab:
 
| Property        | Description                                 | Example          |
|----------------|---------------------------------------------|------------------|
| **Width**       | Chart width                                 | `50%`, `300px`   |
| **Height**      | Chart height                                | `150px`, `400px` |
| **Background**  | Background color of the chart container     | `#FFFFFF`        |
| **CSS Class**   | Optional class for custom styling           | `my-pie-chart`   |

> *Adjusting dimensions and background in Style settings.*
 
---
 
## Property Configuration
 
| Property       | Description |
|----------------|-------------|
| **Label**       | Title of the chart displayed to the user. |
| **Variable**    | Connects the chart with dynamic data. Must be selected from pre-created variables. |
| **Select Agent** | Specifies the agent that returns chart data. One of the agent's outputs must be mapped to the chosen variable. |

> *Property section including label, variable selection, and agent mapping.*
 
---
 
## Data Binding Instructions
 
1. **Create Variable**: From the Variable section.
2. **Assign Variable**: In the chart’s Property tab.
3. **Configure Agent**: Choose an agent and ensure one of its outputs maps to the selected variable.

> *Variable creation and selection process for Pie Chart.*
 
---
 
## Preview Chart
 
When you drop the Pie Chart into the canvas, a sample dataset is shown as a visual guide:
 
- Categories: A, B, C
- Values: 1048, 735, 580
 
This placeholder data disappears once a real variable is connected.
 
---
 
## Summary
 
- Useful for showing distribution of values.
- Customize label, width, height, background.
- Dynamic data through agent + variable.
- Previews with static sample data during design.