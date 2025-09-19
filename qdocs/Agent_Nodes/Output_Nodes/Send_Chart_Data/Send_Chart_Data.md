## Node Guide: Send Chart Data

### Overview  
The **Send Chart Data** node is used to visualize structured data in chart format using ECharts configuration.  
This helps convey insights and summaries through charts like bar, line, or pie graphs during workflow interactions.

### What This Node Does
- Renders a chart visualization using ECharts options  
- Displays an optional summary message above the chart  
- Accepts configuration from variables only  

### Configuration Details

#### 1. Summary  
- Select a variable (from the dropdown) containing a brief description or title for the chart  
- This provides context for the visualization  

#### 2. Data (ChartData)  
- Select a JSON-formatted variable that follows the ECharts-compatible structure below  
- Must be wrapped under the `ChartData` key

```
{
  "ChartData": {
    "title": {
      "text": "Chart Title",
      "subtext": "Optional Subtitle",
      "left": "left"
    },
    "tooltip": {
      "trigger": "axis"
    },
    "legend": {
      "orient": "vertical",
      "left": "left",
      "top": "bottom",
      "data": ["Sales", "Returns"]
    },
    "xAxis": {
      "type": "category",
      "data": ["Jan", "Feb", "Mar"]
    },
    "yAxis": {
      "type": "value"
    },
    "series": [
      {
        "name": "Sales",
        "type": "bar",
        "data": [120, 200, 150]
      },
      {
        "name": "Returns",
        "type": "line",
        "data": [20, 50, 30]
      }
    ]
  }
}
```

![ :( Can't load image ](/qdocs/Agent_Nodes/Output_Nodes/Send_Chart_Data/Send_Chart_Data_Node_Image_1.png)

### Inputs

**Summary:**  
Variable containing the summary string

**Data:**  
Variable holding ECharts-compatible configuration inside a `ChartData` key

---

### Outputs

- No output data  
- Displays a rendered chart in the interface

---

### When to Use

Use this node when you want to:

- Visually represent data trends, comparisons, or breakdowns  
- Show statistics, analytics, or summaries in a compelling format  
- Help users or agents interpret data faster during workflow steps

---

### Example Use Case

**Scenario:** Visualize Monthly Sales Trends  

**Setup:**
- **Summary Variable:** `sales_summary` (e.g., “Monthly Sales Overview”)  
- **Data Variable:** `sales_chart_data` (containing a `ChartData` object for a bar + line chart)

```
{
  "ChartData": {
    "title": { "text": "Sales vs Returns", "left": "center" },
    "tooltip": { "trigger": "axis" },
    "legend": { "data": ["Sales", "Returns"], "top": "bottom" },
    "xAxis": { "type": "category", "data": ["Jan", "Feb", "Mar"] },
    "yAxis": { "type": "value" },
    "series": [
      { "name": "Sales", "type": "bar", "data": [100, 200, 150] },
      { "name": "Returns", "type": "line", "data": [10, 30, 20] }
    ]
  }
}
```

### Summary

The **Send Chart Data** node makes it easy to include visually appealing charts in your workflow.  
It works with any **ECharts-compatible JSON** and is ideal for representing trends, KPIs, or summaries using data-driven visuals.

Let me know if you’d like to extend this with:
- Theme options  
- Interactivity (e.g., click events)  
- Dynamic data switching