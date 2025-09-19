# Description
The **Button** component allows users to perform specific actions by triggering a configured agent or interaction on click. It can be customized with text labels, icons, styles, and visual variants to match your application theme.

This component is perfect for submitting forms or triggering workflows.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Button/Button_Image_1.png)

---

# Properties

| Name             | Description                                                  | Type              | Example              |
|------------------|--------------------------------------------------------------|-------------------|----------------------|
| Button label     | The text displayed inside the button                         | String            | "Submit"             |
| Required Icon             | Whether to show an icon on the button                        | Boolean           | true / false         |
| Icon position    | Where to place the icon relative to the label                | String            | "left" / "right"     |
| Variant          | Visual style of the button                                   | String (choice)   | "outlined", "filled" |

---

# Style Options

| Name               | Description                                           | Type    | Example              |
|--------------------|-------------------------------------------------------|---------|----------------------|
| Width              | Width of the button                                   | String  | `100%`, `200px`      |
| Height             | Height of the button                                  | String  | `40px`, `auto`       |
| Background color   | Background color of the button                        | String  | `#007bff`            |
| Border radius      | Corner rounding for the button                        | String  | `4px`, `8px`         |
| Custom CSS class   | A custom class defined in the style editor            | String  | `primary-action-btn` |

---

# Actions

| Event     | Description                                        | Configuration Example               |
|-----------|----------------------------------------------------|-------------------------------------|
| onClick   | Triggers an agent or workflow on button click      | Assign agent from action panel      |

> You can choose any available agent from your list and bind it to this button for execution when clicked.

---

# Usage Tips

- Use the **variant** option (`outlined` or `filled`) to visually match the button with your layout.
- The **icon** can be helpful for indicating intent.
- Pair buttons with other components like forms or cards to improve UI interaction flow.

