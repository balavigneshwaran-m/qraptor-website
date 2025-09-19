# Description
The **Date** component allows users to select a date within a form, commonly used for fields like Date of Birth or scheduling inputs. It offers full customization for input behavior, formatting, and visual styling.

This component is ideal for capturing date inputs with flexibility in selection and display options.

---

# Example Preview
![:( Can't load image](/qdocs/UI_Nodes/Form/Date/Date_Image_1.png)
---

# Properties

| Name                | Description                                                                 | Type                | Example                 |
|---------------------|-----------------------------------------------------------------------------|---------------------|-------------------------|
| Date    | Maps the selected date to a defined form variable                          | String (Variable)   | `userDOB`               |
| Placeholder          | Placeholder text displayed before selection                                | String              | "Select birth date"     |
| Manual input   | Determines if the user can type in the date manually                       | String (choice)             | True / False            |
| Date format          | Format for displaying and parsing the date                                 | String              | `mm/dd/yy`, `dd-mm-yy`  |
| Date Selection mode       | Determines how dates can be selected                                       | String (choice)     | "Single", "Multiple", "Range" |
| Show footer          | Whether to display a footer with a “Today” shortcut                        | String (choice)             | Yes / No            |
| Variant              | Visual style of the component                                              | String (choice)     | "Outlined", "Filled"    |
| Is Disabled           | Whether the date component is disabled                                     | String (choice)             | Yes / No            |
| Size                 | Controls the size of the date picker                                       | String (choice)     | "Small", "Normal", "Large" |

---

# Style Options

| Name               | Description                                             | Type    | Example            |
|--------------------|---------------------------------------------------------|---------|--------------------|
| Width              | Width of the date component                             | String  | 100%, 200px        |
| Height             | Height of the date component                            | String  | 40px, auto         |
| Custom CSS class   | A custom class defined in the style editor              | String  | form-date-picker   |

---

# Date Format Tokens

| Token   | Description                          |
|---------|--------------------------------------|
| d       | Day of month (no leading zero)       |
| dd      | Day of month (two digits)            |
| o       | Day of the year (no leading zeros)   |
| oo      | Day of the year (three digits)       |
| D       | Day name short                       |
| DD      | Day name long                        |
| m       | Month (no leading zero)              |
| mm      | Month (two digits)                   |
| M       | Month name short                     |
| MM      | Month name long                      |
| y       | Year (two digits)                    |
| yy      | Year (four digits)                   |
| @       | Unix timestamp                       |
| !       | Windows ticks                        |
| '...'   | Literal text                         |
| ''      | Single quote                         |

---

# Usage Tips

- Use **variable mapping** to store selected dates for further processing in workflows or conditions.
- Set **manual input** to false for consistent formatting and valid inputs.
- Use **selection modes** like multiple or range when users need to choose more than one date.
- Show the **footer** option to allow quick access to the current date.
- Adjust **size** and **variant** to match the styling of your overall form layout.
