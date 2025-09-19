# Node Guide: Image Validator

## Overview

The **Image Validator** node allows your agent to **scan images stored in a folder** and determine whether a specific object — such as a vehicle, person, building, or container — is present within those images.  
It is useful for **image verification workflows**, **quality checks**, or **visual evidence validation** processes.

## What It Does

Once triggered:

● Retrieves all images from the specified folder in the **Data Vault**  

● Checks each image for the specified **object type**  

● Returns a result stating whether the object was found or not  

● Saves the validation result in the configured output variable  

## Configuration Details

1. **Folder Id**  

    ● The unique ID of the folder where your images are stored  

    ● This folder must be created in the **Data Vault** before using the node  

    ● You can type the ID manually or reference it from a variable

2. **Object Type**  

    ● Specifies the type of object the node should detect in the images  

    ● Example values: `vehicle`, `person`, `tree`, `container`  

    ● Determines the validation criteria for the image scan  

3. **Output Variable**  

    ● The agent variable where the validation result will be stored  

    ● The result will typically state whether the specified object was found

![ :( Can't load image ](/qdocs/Agent_Nodes/AI_Agents/Image_Validator/Image_Validator_Image_1.png)

## Inputs

● Folder Id (manual entry or variable reference)

● Object Type (e.g., vehicle, person, tree)


## Outputs

● **Output Variable** — Stores the final validation result (boolean or descriptive message)  

The output can be used in subsequent workflow steps to trigger actions based on the result.

## When to Use

Use the Image Validator node when you want to:  

● Verify that a specific object is present in a set of images

● Automate visual quality control checks

● Confirm visual evidence for reporting or compliance


## Example Flow: Validate Vehicle Images

### Scenario

A user uploads a set of parking lot photos, and you need to verify that at least one image contains a vehicle.

### Flow Steps

1. **Image Validator Node**  

    ● Folder Id: `{{uploaded_folder_id}}`  

    ● Object Type: `vehicle`  

    ● Output Variable: `vehicle_check_result`  

2. **Condition Node**  

    ● If `vehicle_check_result` is true, continue the workflow  

    ● If false, send a message requesting correct image uploads  

### Summary of the Flow

● Scans the images from the given folder

● Checks if the specified object is present

● Stores the result for downstream workflow decisions