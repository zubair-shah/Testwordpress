import React, { Component } from 'react';
import { render } from 'react-dom';
const ReuseForm = __REUSEFORM__;
import Menu from './menu';
const fields = SCHOLAR_ADMIN.DYNAMIC_PAGE;
const conditions = SCHOLAR_ADMIN.conditions;

export default class DynamicPageGenerator extends Component {
  constructor(props) {
    super(props);
    const selectOptions = SCHOLAR_ADMIN.postTypes;
    let preValue = {};
    try {
      preValue = SCHOLAR_ADMIN.PAGE_SETTINGS
        ? JSON.parse(SCHOLAR_ADMIN.PAGE_SETTINGS)
        : {};
    } catch (e) {
      console.log(e);
    }

    this.state = {
      menuId: 'header',
      fields: SCHOLAR_ADMIN.DYNAMIC_PAGE,
      preValue,
    };
  }
  render() {
    const { fields, preValue } = this.state;

    const getUpdatedFields = data => {
      document.getElementById('_turbo_page_settings').value = JSON.stringify(
        data
      );
    };
    const reuseFormOption = {
      reuseFormId: 'PageSettings',
      fields,
      getUpdatedFields,
      errorMessages: {},
      menuId: this.state.menuId,
      preValue,
      conditions,
    };

    const changeMenu = newMenuId => {
      this.setState({
        menuId: newMenuId,
      });
    };
    return (
      <div className={'scwp-pageSettings-wrapper'}>
        <Menu
          fields={fields}
          changeMenu={changeMenu}
          menus={SCHOLAR_ADMIN.DYNAMIC_TABS}
          menuId={this.state.menuId}
        />
        <ReuseForm {...reuseFormOption} />
      </div>
    );
  }
}

const documentRoot = document.getElementById('reuse_turbo_page_settings');
if (documentRoot) {
  render(<DynamicPageGenerator />, documentRoot);
}
