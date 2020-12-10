# reuseform-antd

Last reuse-form you'll ever use

## Installation

```
 - clone it into your home directory.
 - npm i ~/reuse-form
```

enjoy 😎
🤘 🙄

# Usase

## reuse form option

```
const reuseOption = {
    reuseFormId: `reuseFormId`,
    fields: [
      {
        'id': 'field1',
        'type': 'textarea',
        'label': 'reuse 02',
        'subtitle': 'Insert the button text',
        'value': '',
        'placeholder': 'enter your text here...',
      },
      {
        'id': 'field2',
        'type': 'textarea',
        'label': 'reuse 02',
        'subtitle': 'Insert the button text',
        'value': '',
        'placeholder': 'enter your text here...',
      },
    ],
    getUpdatedFields = (data, selectedReuseFormId, allErrors) => {},
    preValue: {field1: 'text', field2: 'text2'},
    errorMessages: {},
    refresh: '1' // for refreshing change refresh value
  };
```

## render

```
<ReuseForm {...reuseOption} />
```

## validation

```
'validation': {
  'require': 'notNull', //'notNull', 'isEmail', 'isNumeric', 'isURL'
  'errorMessage': 'plz fill in the box',
},
```

## Bundle

```
  id: 'bundle',
  label: 'Choose bundle',
  type: 'bundle',
  fields: [],
```

to modify bundle data

```
import getBundleData from 'reuse-form/library/getBundleData';
const bundle_14 = getBundleData(val.bundle_14);
```

# Fields

## a-tags

```
  id: 'atag',
  type: 'atag',
  target: 'blank' //'target', 'self', 'paarent'
```

### Blank

```
  id: 'reuse_blank',
  type: 'blank',
  width : 50, // optional
  height: 50, // optional
  visiblity: 'true', // optional
```

### Checkbox

```
  id: 'reuse_button_size_checkbox',
  type: 'checkbox',
  label: 'Button Size',
  subtitle: 'Choose the button size',
  default_value: 'large',
  value: '',
  selectionType: '', //'showMore' for more button && 'showAllButton' for show all
  step: 5, // number of columns twhich ill show 1st
  column: 1, // number of columns to show (default 1)
  options: {
    small: 'Small',
    medium: 'Medium',
    large: 'Large'
  }
```

### ColorPicker && ColorPicker Alt

```
  id: 'reuse_button_color',
  type: 'colorpicker/colorpickerAlt',
  label: 'Color',
  subtitle: 'Insert the button color',
  name: 'react-star-rating',
  default_color: 'true',
  data_default_color: '#ffffff',
  placeholder: '',
  palettes: 'true',
  hide_control: 'true',
```

### Combobox

```
  id: 'reuse_combo',
  type: 'combobox',
  label: 'Select combo',
  subtitle: 'combo box val',
  multiple: 'true', // optional
  scrollable: 'false', // optional
  searchable: 'true', // optional
  selectionType: '', //'showMore' for more button && 'showAllButton' for show all
  step: 5, // number of columns twhich ill show 1st
  value: '',
  options: [
    {
      slug: 1,
      name: 'one',
    },
    {
      slug: 2,
      name: 'two',
    },
    {
      slug: 3,
      name: 'three',
      children: [
        {
          slug: 5,
          name: 'five',
          children: [
            {
              slug: 7,
              name: 'seven',
            },
            {
              slug: 8,
              name: 'eight',
            },
          ],
        },
        {
          slug: 6,
          name: 'six',
        },
      ],
    },
  ],
```

### Combo select box

```
  id: 'reuse_comboselect',
  type: 'comboselect',
  label: 'Select comboselect',
  subtitle: 'combo box val',
  clearable: 'false', // optional
  isHorizontal: 'false', // optional
  value: '',
  options: [
    {
      slug: 1,
      name: 'one',
    },
    {
      slug: 2,
      name: 'two',
    },
    {
      slug: 3,
      name: 'three',
      children: [
        {
          slug: 5,
          name: 'five',
          children: [
            {
              slug: 7,
              name: 'seven',
            },
            {
              slug: 8,
              name: 'eight',
            },
          ],
        },
        {
          slug: 6,
          name: 'six',
        },
      ],
    },
  ],
```

### Compound Button

```
  'id': 'reuse_compound_button',
  'type': 'compoundbutton',
  'label':  'buttonTxt',
  'getallData': 'true', // optional
  'getFormData': 'true', // optional
  'buttonType': 'submit', // optional
```

### Count Down

```
  'id': 'reuse_button_count_down',
  'type': 'countdown',
  'label': 'reuse 29',
  'subtitle': 'hello Count',
  'endDate': '06/03/2018 10:12 AM',
```

### DatePicker

```
  id: 'reuse_button_datepicker',
  type: 'datepicker',
  label: 'date picker',
  subtitle: 'Insert date',
  placeholder: 'enter date here...',
  date_format: 'YYYY-MM-DD', // optional
```

### DatePicker Range

```
  id: 'reuse_button_datepickerrange',
  type: 'datepickerrange',
  label: 'date range picker',
  subtitle: 'Insert date range',
  placeholder: 'enter date range here...',
  format: 'YYYY-MM-DD', // optional
  separator: ':', //optional
  singleMonth: 'true',
  anchorDirectionRight: 'true',
  vertical: 'true',
  isRTL: 'true',
  showDefaultInputIcon: 'true',
  customInputIcon: '<span>Icon</span>',
  navPrev: '<span>prev</span>',
  navNext: '<span>next</span>',
  customArrowIcon: '<span>Arrow</span>',
  customCloseIcon: '<span>Close</span>',
  locale: 'fr',
```

### File Upload

```
  id: 'reuse_button_fileupload',
  type: 'fileupload',
  label: 'file upload',
  subtitle: 'upload Files',
  multiple: 'true',
  file_type: 'rar,pdf',
```

### Google Recaptcha

```
  id: 'google_recaptcha',
  type: 'recaptcha',
  site_key: '6LfMahAUAAAAAJ0MMBVm-Rxt_GEnF7-T7dpfNle1',
  value: 'false', // optional
```

### Icon Picker

```
  id: 'reuse_button_iconpicker',
  type: 'iconpicker',
  label: 'Pick Icon',
  subtitle: 'upload Icon',
  value: 'fa fa-edit',
  placeholder: 'enter your icon here...',
```

### Icon Select

```
  id: 'reuse_button_iconselect',
  type: 'iconselect',
  label: 'Select Icon',
  subtitle: 'Select Icon for Rating',
  "options":[
      {
          name: 'fa fa-star',
          value: 'star',
      },
      {
          name: 'fa fa-heart',
          value: 'heart',
      }
  ],
  "value": "heart",
```

### Image Upload

```
  id: 'reuse_button_imageupload',
  type: 'imageupload',
  label: 'Image upload',
  subtitle: 'upload image',
  multiple: 'true',
```

### Image Upload Alter

```
  id: 'reuse_button_imageupload',
  type: 'imageuploadalt',
  label: 'Image Upload',
  subtitle: 'upload Image',
  width: 80,
  height: 100,
```

### Input Mask
```
  id: 'reuse_input_mak',
  type: 'inputMask',
  label: 'Input Mask',
  subtitle: 'Input Mask',
  alwaysShowMask: 'false', // either show mask default false
  placeholder: 'placeholder',
  mask: '9', // 9: 0-9, a: A-Z, a-z, *: A-Z, a-z, 0-9
  maskChar: '', // Character to cover unfilled parts of the mask. Default character is "_".
  value: '123',
```
### Label

```
  id: 'reuse_button_imageupload',
  type: 'label',
  label: 'label',
  label_type: 'h1', // h1-h6, p, span
```

### Pagination

```
  id: 'reuse_pagination',
  type: 'pagination',
  label: 'pagination',
  subtitle: 'select pagination',
  pageSize: 1,
  total: 11,
  isSimple: 'true',
```

### Password

```
  id: 'reuse_button_imageupload',
  type: 'password',
  label: 'password',
  subtitle: 'select password',
  action: 'login' // 'login', 'signUp'
```

### Map

```
  id: 'reuse_map_autocomplete',
  type: 'geobox',
  label: 'HEY ITS label',
  subtitle: 'yo yo',
  value: '',
  placeholder: 'aha aha placeholder',
  'maptype': 'google', // 'mapbox' currently google is only supported
```

### Map AutoComplete

```
  id: 'reuse_map_autocomplete',
  type: 'mapautocomplete',
  repeat: 'true',
  label: 'HEY ITS label',
  subtitle: 'yo yo',
  value: '',
```

### Minmax Button

```
  id: 'reuse_button_rating',
  type: 'minmaxbutton',
  label: 'Max min',
  subtitle: Set Min Max',
  value: 0,
  step: 2,
  min: 0,
  max: 10,
```

### Opening Hours

```
  id: 'reuse_opening_hour',
  type: 'openingHour',
  label: 'Enter Opening hour',
  subtitle: 'opening hours',
  value: '',
  placeholder: 'aha aha placeholder',
  options: [
      {
        value: 'selectedHour',
        title: 'Open on selected hours',
        hoursAvailable: true,
      },
      {
        value: 'alwaysOpen',
        title: 'Always open',
      },
      {
        value: 'noHour',
        title: 'No hours available',
      },
      {
        value: 'permanentlyClosed',
        title: 'Permanently closed',
      },
    ],
  weekDays: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], //optional
  stepMin: 15, //optional
  format24hr: 'false', //optional
  timeSeparator: ':', //optional
```

### Radio

```
  id: 'reuse_button_size',
  type: 'radio',
  label: 'Button Style',
  subtitle: 'Choose the button style',
  selectionType: '', //'showMore' for more button && 'showAllButton' for show all
  step: 5, // number of columns twhich ill show 1st
  column: 1, // number of columns to show (default 1)
  options: {
    red: 'Red',
    green: 'Green',
    blue: 'Blue'
  },
  value: 'red,green',
```

### Rating

```
  id: 'reuse_button_rating',
  type: 'rating',
  label: 'Rating',
  subtitle: 'upload Image',
  name: 'react-star-rating',
  starCount: 10, // optional
  editing: 'true', // optional
  starIcon: '', // optional
  starColor: '#f0f', // optional
  emptyStarColor: '#ff0', // optional
  multiple: 'true',
  value: 'small:3,large:4,medium:5',
  options: {
    small: 'Small',
    medium: 'Medium',
    large: 'Large',
  },
```

### Search Rating Component

```
  {
    id: 'reuse_search_rating',
    type: 'searchRating',
    param: 'searchRating',
    label: 'Search Rating',
    subtitle: 'This is a Rating Search Component',
    max: 5,
    min: 1,
    countOption: {
      5: 12,
      4: 34,
      3: 5,
      2: 45,
      1: 24,
    },
    editing: 'false',
    ratingIcon: 'ion-android-star', // optional
    emptyRatingIcon: 'ion-android-star-outline',
    starColor: '#737373', // optional
    emptyStarColor: '#bebebe', // optional
    organizeType: 'desc', // desc, asc
    searchType: 'up', // up, down, exact (age jeita select korbe seita show korbe than baki gula)
    searchTypeText: '& Up', //
    showCount: 'true',
    showCountZeroStar: 'true',
  },
```

### Select

```
  id: 'reuse_button_multiple',
  type: 'select',
  label: 'Button Style',
  multiple: 'true',
  clearable: 'false',
  subtitle: 'Choose the button style',
  options: {
    red: 'Red',
    green: 'Green',
    blue: 'Blue'
  },
  value: 'red,green',
```

### Selected Group

```
  id: 'reuse_select_Group',
  subtype: 'simple',  //'simple', 'airbnbCb', 'onlyImage', 'imageLabel', 'color', 'iconLabelBackground', smallIcon, tagSelect, circular
  type: 'selectGroup',
  label: 'Select Group',
  subtitle: 'select grp',
  value: '',
  multiple: 'true', // optional
  allButton: 'true', // optional
  options: [
    {
      value: 'selectedHour',  //'simple', 'tagSelect', 'circular'
      title: 'selected Hour',
      premium:'true' // to open swal for reactive lite
    },
    {
      value: 'selectedHour',  //'airbnbCb'
      title: 'selected Hour',
      ionClassName: 'fsfsfsf',
    },
    {
      value: 'selectedHour',  //'onlyImage'
      src: 'fsfsfsf',
      alt: '',
    },
    {
      value: 'selectedHour',  //'imageLabel'
      title: 'selected Hour',
      src: 'fsfsfsf',
      alt: '',
    },
    {
      value: 'selectedHour',  //'color'
      hex: '#ff4433',
    },
    {
      value: 'option3',  //'iconLabelBackground'
      title: 'option 3',
      background: '#ff0000',
      ionClassName: 'fa fa-download',
      iconColor: '#123456',
    },
    {
      value: 'option 4',  //'smallIcon'
      background: '#ff0000',
      ionClassName: 'fa fa-download',
      iconColor: '#123456',
    }
  ],
```

### Slider && SLider Alter

```
  id: 'reuse_button_width',
  type: 'slider/slideralt',
  label: 'Button Width',
  subtitle: 'Choose the button width',
  min: 0,
  max: 100,
  step: 1,
  from: 50,
  to: 100,
  range: 'single',
  range: 'double',
  hide_min_max: 'true',
  hide_from_to: 'false',
  grid: 'false',
  prefix: 'prefix',
  postfix: 'postfix',
```

### Sort

```
  id: 'reuse_sort',
  type: 'sort',
  label: 'Select sort',
  subtitle: 'select sort',
  value: '', // optional
  defaultText: 'Default'
  ascIconUrl: 'fa fa-sort-amount-asc',
  descIconUrl: 'fa fa-sort-amount-desc',
  options: {
    red: 'Red',
    green: 'Green',
    blue: 'Blue'
  },
```

### Tags

```
  id: 'reuse_tags',
  type: 'tags',
  label: 'Select tags',
  subtitle: 'select tgs',
  value: '', // optional
  suggestions: ['Banana', 'Mango', 'Pear', 'Apricot'], // optional
  placeholder: 'type tags', // optional
  minQueryLength: 1, // optional
  removeTextField: 'true' // optional hide text
```

### Text

```
  'id': 'reuse_button_content',
  'type': 'text',
  'label': 'reuse 01',
  'clearbutton': 'true' // to add cross button to clear all the written text in input field
  'subtitle': 'Insert the button text',
  'value': '',
  'placeholder': 'enter your text here...',
  'enterEnable': 'true', // return value on enter
  'debounce' : 'true', // to add debounce
```

### Tex-repeat

```
  'id': 'reuse_button_content',
  'type': 'text-repeat',
  'label': 'reuse 01',
  'subtitle': 'Insert the button text',
  'value': '',
  'placeholder': 'enter your text here...',
  'enterEnable': 'true', // return value on enter
```

### TextArea

```
  'id': 'reuse_button_content_area',
  'type': 'textarea',
  'label': 'reuse 02',
  'subtitle': 'Insert the button text',
  'value': '',
  'placeholder': 'enter your text here...',
```

### Text Editor

```
  'id': 'reuse_button_texteditor',
  'type': 'texteditor',
  'label': 'reuse 19',
  'subtitle': 'write button text',
  'value': 'small',
```

### Time Period

```
  id: 'reuse_time_period',
  type: 'timePeriod',
  label: 'Select time Period',
  subtitle: 'Select time period ',
  presentText: 'I currently work here 2', //optional
  presentStatusText: 'present 2', //optional
  monthNames: [ 'January', 'Feb', 'March', 'April', 'May', 'June', 'July','Aug', 'Sep', 'Oct', 'Nov', 'Dec' ], // optional
  separator: 'to', //optional
```

### Toggle && Toggle Alter

```
  id: 'reuse_button_show_icon',
  type: 'switchalt',
  label: 'reuse 07',
  subtitle: 'Choose the button icon show/hide',
  value: 'true',
```

### BASIC HTML

```
  type: 'basicHtml',
  'html: '<button>Please select appropriate pages</button>',
```



# Conditional logic

#####A `logicForm` consists of 2 keys
_ formId: Id of the Form
_ logicBlock: An array of all the logics of the corresponding form. Each logic has 2 keys. - effectField: The fields that are affected by the result of the key 'logicBuilder', - logicBuilder: The relation array of the field. Example: A and (B or C) or (F)


```
const logicForm = {
  formId: '1q',
  logicBlock : [
    {
      effectField: [
        {
          action: 'show',
          fieldId: '1q__reuse_button_imageupload',
        }, {
          action: 'hide',
          fieldId: '1q__reuse_button_multiple',
        }, {
          action: 'set',
          fieldId: '1q__something',
          value: 'hello',
        }
      ],
      logicBuilder: [
        {
          key: 'field',
          value: {
            fieldID: '1q__reuse_button_rating',
            secondOperand: {
              type: 'value',
              value: 5,
            },
            operator: 'less_than',
          },
          childresult: null,
        }
      ]
    },
    {
      effectField: [
        {
          action: 'hide',
          fieldId: '1q__reuse_button_imageupload',
        }, {
          action: 'show',
          fieldId: '1q__reuse_button_multiple',
        }, {
          action: 'set',
          fieldId: '1q__something',
          value: 'hi',
        }
      ],
      logicBuilder: [
        {
          key: 'field',
          value: {
            fieldID: '1q__reuse_button_rating',
            secondOperand: {
              type: 'value',
              value: 5,
            },
            operator: 'greater_than',
          },
          childresult: null,
        }
      ]
    }
  ]
};
```
