var schemaTest = {
    "schema": {
      "type": "object",
      "required": [
        "donation_info",
        "personal_info",
        "billing_address"
      ],
      "additionalProperties": false,
      "properties": {
        "donation_info": {
          "title": "Donation Details",
          "type": "object",
          "required": [
            "amount",
            "recurring",
            "stripe_token"
          ],
          "additionalProperties": false,
          "properties": {
            "amount": {
              "title": "Donation Amount",
              "type": "number",
              "enum": [10.00, 25.00, 50.00, 0.00]
            },
            "custom_amount": {
              "title": "Custom Donation Amount",
              "type": "number",
              "minimum": 1,
              "maximum": 999999.99,
              "multipleOf": 0.01
            },
            "recurring": {
              "type": "boolean"
            },
            "frequency": {
              "title": "Donation Frequency",
              "type": "string",
              "default": "monthly",
              "enum": [
                "monthly",
                "bimonthly",
                "annually"
              ]
            },
            "first_charge": {
              "title": "First Donation Date",
              "type": "string",
              "format": "date"
            },
            "stripe_token": {
              "title": "Credit/Debit Card",
              "type": "string",
              "pattern": "^tok_[a-zA-Z0-9]{24}$"
            }
          },
          "dependencies": {
            "custom_amount": ["amount"],
            "frequency": ["recurring"],
            "first_charge": ["recurring"]
          }
        },
        "personal_info": {
          "title": "Personal Information",
          "type": "object",
          "required": [
            "email",
            "first_name",
            "last_name"
          ],
          "additionalProperties": false,
          "properties": {
            "email": {
              "title": "Email Address",
              "type": "string",
              "format": "email",
              "minLength": 5,
              "maxLength": 254,
              "pattern": "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$"
            },
            "first_name": {
              "title": "First Name",
              "type": "string",
              "minLength": 1,
              "maxLength": 512
            },
            "last_name": {
              "title": "Last Name",
              "type": "string",
              "minLength": 1,
              "maxLength": 512
            }
          }
        },
        "billing_address": {
          "title": "Billing Address",
          "type": "object",
          "required": [
            "address_line_1",
            "city",
            "state",
            "zip_code"
          ],
          "additionalProperties": false,
          "properties": {
            "address_line_1": {
              "title": "Address",
              "type": "string",
              "minLength": 3,
              "maxLength": 512
            },
            "address_line_2": {
              "type": "string",
              "minLength": 1,
              "maxLength": 512
            },
            "city": {
              "title": "City",
              "type": "string",
              "minLength": 1,
              "maxLength": 512
            },
            "state": {
              "title": "State",
              "type": "string",
              "enum": [
                "AL",
                "AK",
                "AS",
                "AZ",
                "AR",
                "AE",
                "AP",
                "AA",
                "CA",
                "CO",
                "CT",
                "DE",
                "DC",
                "FM",
                "FL",
                "GA",
                "GU",
                "HI",
                "ID",
                "IL",
                "IN",
                "IA",
                "KS",
                "KY",
                "LA",
                "ME",
                "MH",
                "MD",
                "MA",
                "MI",
                "MN",
                "MS",
                "MO",
                "MT",
                "NE",
                "NV",
                "NH",
                "NJ",
                "NM",
                "NY",
                "NC",
                "ND",
                "MP",
                "OH",
                "OK",
                "OR",
                "PW",
                "PA",
                "PR",
                "RI",
                "SC",
                "SD",
                "TN",
                "TX",
                "UT",
                "VT",
                "VI",
                "VA",
                "WA",
                "WV",
                "WI",
                "WY"
              ]
            },
            "zip_code": {
              "title": "Zip Code",
              "type": "string",
              "pattern": "^[0-9]{5}(\\-[0-9]{4})?$"
            }
          }
        }
      }
    },
    "view": {
      "parent": "bootstrap-create",
      "fields": {
        "/personal_info/email": {
          "messages": {
            "invalidEmail": "Invalid email address, e.g. someone@somewhere.com"
          }
        },
        "/billing_address/zip_code": {
          "messages": {
            "invalidPattern": "This is not a five-digit (99999) or nine-digit (99999-9999) zip code."
          }
        },
        "/donation_info/stripe_token": {
          "templates": {
            "control-text": "<input type=\"hidden\" name=\"stripe_token\"/><div id=\"card-element\"></div><div id=\"card-errors\" class=\"help-block\"></div>"
          }
        }
      }
    },
    "options": {
      "form": {
        "toggleSubmitValidState": false,
        "buttons": {
          "submit": {
            "title": "Donate"
          }
        }
      },
      "fields": {
        "donation_info": {
          "showMessages": false,
          "fields": {
            "recurring": {
              "rightLabel": "Make this a recurring donation"
            },
            "frequency": {
              "sort": false,
              "hideNone": true,
              "optionLabels": [
                "Monthly",
                "Bi-Monthly",
                "Annually"
              ]
            },
            "first_charge": {
              "type": "date"
            },
            "amount": {
              "sort": false,
              "hideNone": true,
              "type": "radio",
              "optionLabels": [
                "$10.00",
                "$25.00",
                "$50.00",
                "Custom Amount"
              ]
            },
            "custom_amount": {
              "dependencies": {
                "amount": 0.00
              },
              "type": "currency"
            },
            "stripe_token": {
              "showMessages": false
            }
          }
        },
        "personal_info": {
          "showMessages": false,
          "fields": {
            "email": {
              "maxMessages": 1
            },
            "first_name": {
              "maxMessages": 1
            },
            "last_name": {
              "maxMessages": 1
            }
          }
        },
        "billing_address": {
          "showMessages": false,
          "fields": {
            "address_line_1": {
              "maxMessages": 1,
              "label": "Billing Address",
              "placeholder": "Street and number, P.O. box, c/o."
            },
            "address_line_2": {
              "placeholder": "[Optional] Apartment, suite, unit, building, floor, etc."
            },
            "city": {
              "maxMessages": 1
            },
            "state": {
              "maxMessages": 1,
              "noneLabel": "Select a state...",
              "hideNone": false,
              "optionLabels": [
                "Alabama",
                "Alaska",
                "American Samoa",
                "Arizona",
                "Arkansas",
                "Armed Forces Europe",
                "Armed Forces Pacific",
                "Armed Forces Americas",
                "California",
                "Colorado",
                "Connecticut",
                "Delaware",
                "District of Columbia",
                "Federated States of Micronesia",
                "Florida",
                "Georgia",
                "Guam",
                "Hawaii",
                "Idaho",
                "Illinois",
                "Indiana",
                "Iowa",
                "Kansas",
                "Kentucky",
                "Louisiana",
                "Maine",
                "Marshall Islands",
                "Maryland",
                "Massachusetts",
                "Michigan",
                "Minnesota",
                "Mississippi",
                "Missouri",
                "Montana",
                "Nebraska",
                "Nevada",
                "New Hampshire",
                "New Jersey",
                "New Mexico",
                "New York",
                "North Carolina",
                "North Dakota",
                "Northern Mariana Islands",
                "Ohio",
                "Oklahoma",
                "Oregon",
                "Palau",
                "Pennsylvania",
                "Puerto Rico",
                "Rhode Island",
                "South Carolina",
                "South Dakota",
                "Tennessee",
                "Texas",
                "Utah",
                "Vermont",
                "Virgin Islands",
                "Virginia",
                "Washington",
                "West Virginia",
                "Wisconsin",
                "Wyoming"
              ]
            },
            "zip_code": {
              "maxMessages": 1
            }
          }
        }
      }
    }
  };
