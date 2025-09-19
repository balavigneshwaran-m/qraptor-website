# Description
The **Input** component allows users to enter text-based data such as names, email addresses, or numeric input. It supports two-way data binding using variables, making it ideal for forms, search bars, or interactive fields.

This component can be customized in terms of layout, appearance, and data handling behavior.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Input/Input_Image_1.png)

---

# Properties

| Name            | Description                                                              | Type               | Example             |
|------------------|--------------------------------------------------------------------------|--------------------|---------------------|
| Input value      | The v-model variable to bind and update as the user types               | Variable binding   | `userEmail`         |
| Input label      | The label displayed above or beside the input field                     | String             | "Email Address"     |
| Value type       | Specifies the expected input type                                       | String (choice)    | "text", "email", "number" |
| Is disabled      | Controls whether the input is editable                                  | Boolean            | true / false        |

---

# Style Options

| Name               | Description                                      | Type    | Example              |
|--------------------|--------------------------------------------------|---------|----------------------|
| Width              | Width of the input field                         | String  | `100%`, `300px`      |
| Height             | Height of the input box                          | String  | `40px`, `auto`       |
| Color              | Text color used inside the input                 | String  | `#333333`            |
| Custom CSS class   | A custom class defined in the style editor       | String  | `custom-input-style` |

---

# Usage Tips

- Bind the **input value** to a reactive variable for real-time data updates in forms.
- Use **value type** to enable input-specific behavior like numeric keypads or email validation.
- The **is disabled** option is useful for read-only fields or conditional interactions.
- Combine with buttons or other form components for complete input workflows.

