import React, { Component } from 'react';
import { render } from 'react-dom';
const ReuseForm = __REUSEFORM__;
import Menu from './menu';
const fields = TURBO_ADMIN.DYNAMIC_POST;
const conditions = TURBO_ADMIN.conditions;

export default class DynamicPostGenerator extends Component {
  constructor(props) {
    super(props);
    const selectOptions = TURBO_ADMIN.postTypes;
    let preValue = {};
    try {
      preValue = TURBO_ADMIN.POST_SETTINGS
        ? JSON.parse(TURBO_ADMIN.POST_SETTINGS)
        : {};
    } catch (e) {
      console.log(e);
    }
    this.state = {
      menuId: 'general',
      fields: TURBO_ADMIN.DYNAMIC_POST,
      preValue,
    };
  }
  render() {
    const { fields, preValue } = this.state;

    const getUpdatedFields = data => {
      document.getElementById('_turbo_post_settings').value = JSON.stringify(
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
          menus={TURBO_ADMIN.DYNAMIC_POST_TABS}
          menuId={this.state.menuId}
        />
        <ReuseForm {...reuseFormOption} />
      </div>
    );
  }
}

const documentRoot = document.getElementById('reuse_turbo_post_settings');
if (documentRoot) {
  render(<DynamicPostGenerator />, documentRoot);
}
