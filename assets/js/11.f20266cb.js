(window.webpackJsonp=window.webpackJsonp||[]).push([[11],{354:function(t,e,a){"use strict";a.r(e);var s=a(43),n=Object(s.a)({},(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[a("h2",{attrs:{id:"plugin-settings"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#plugin-settings"}},[t._v("#")]),t._v(" Plugin Settings")]),t._v(" "),a("p",[t._v("You may override the default plugin settings by creating a "),a("code",[t._v("/config/saml-sp.php")]),t._v(" file.")]),t._v(" "),a("p",[t._v("View the settings you can override in your project at "),a("code",[t._v("/vendor/flipboxfactory/saml-sp/src/models/Settings.php")]),t._v(". Each setting has a description of what it does and how to customize it.")]),t._v(" "),a("h3",{attrs:{id:"entityid"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#entityid"}},[t._v("#")]),t._v(" EntityID")]),t._v(" "),a("p",[t._v("Currently you can edit the EntityID "),a("strong",[t._v("system wide")]),t._v(" a couple ways. Note that the value can be an environmental variable so that might be something to consider.")]),t._v(" "),a("h4",{attrs:{id:"_1-add-a-config-file-in-config-saml-sp-php"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#_1-add-a-config-file-in-config-saml-sp-php"}},[t._v("#")]),t._v(" 1. Add a config file in "),a("code",[t._v("config/saml-sp.php")]),t._v(".")]),t._v(" "),a("p",[t._v("This location lives right next to the "),a("code",[t._v("general.php")]),t._v(". Below is an example file contents.")]),t._v(" "),a("div",{staticClass:"language-php extra-class"},[a("pre",{pre:!0,attrs:{class:"language-php"}},[a("code",[a("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n   "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'entityId'")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'https://my-entity-id'")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),a("h4",{attrs:{id:"_2-edit-from-the-admin-goto-the-plugin-in-craft-then-click-on-the-settings-menu-item-under-the-plugins-sub-nav"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#_2-edit-from-the-admin-goto-the-plugin-in-craft-then-click-on-the-settings-menu-item-under-the-plugins-sub-nav"}},[t._v("#")]),t._v(' 2. Edit from the admin (Goto the plugin in craft, then click on the "Settings" menu item under the plugins sub nav).')]),t._v(" "),a("p",[t._v("Set the Entity ID there which will save it to the db")]),t._v(" "),a("h3",{attrs:{id:"group-configuration-group-assignment"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#group-configuration-group-assignment"}},[t._v("#")]),t._v(" Group Configuration/Group Assignment")]),t._v(" "),a("h4",{attrs:{id:"group-attribute-name-group-attribute-mapping"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#group-attribute-name-group-attribute-mapping"}},[t._v("#")]),t._v(" Group Attribute Name/Group Attribute Mapping")]),t._v(" "),a("p",[t._v("Many IdPs will send groups as an attribute within the SAML Response. When configured, the plugin use that attribute to\nautomatically create (if needed) and assign the user properly. To achieve this,  add a "),a("code",[t._v("config/saml-sp.php")]),t._v(" then use the\nfollowing configuration.")]),t._v(" "),a("h5",[t._v("Example")]),t._v(" "),a("div",{staticClass:"language-php extra-class"},[a("pre",{pre:!0,attrs:{class:"language-php"}},[a("code",[a("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token comment"}},[t._v("// change the value as needed")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'groupAttributeNames'")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'groups'")]),t._v("\n"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),a("p",[t._v("Make sure the value matches the attribute name sent from the IdP.")]),t._v(" "),a("h4",{attrs:{id:"auto-create-group"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#auto-create-group"}},[t._v("#")]),t._v(" Auto-Create Group")]),t._v(" "),a("p",[t._v("By default the plugin will create the group if the group attribute name is mapped correctly. You can\nturn this off if desired using "),a("code",[t._v("autoCreateGroups")]),t._v(".")]),t._v(" "),a("h5",[t._v("Example")]),t._v(" "),a("div",{staticClass:"language-php extra-class"},[a("pre",{pre:!0,attrs:{class:"language-php"}},[a("code",[a("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("return")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("[")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'groupAttributeNames'")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'groups'")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token comment"}},[t._v("// this will turn off the automatic creation of groups")]),t._v("\n    "),a("span",{pre:!0,attrs:{class:"token single-quoted-string string"}},[t._v("'autoCreateGroups'")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v(">")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token boolean constant"}},[t._v("false")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(",")]),t._v("\n"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("]")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),a("h4",{attrs:{id:"managing-permissions"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#managing-permissions"}},[t._v("#")]),t._v(" Managing Permissions")]),t._v(" "),a("p",[t._v("Managing permissions ** is not supported ** automatically. There are a few options on how to manually manage\npermissions:")]),t._v(" "),a("ol",[a("li",[t._v("Create the groups before the SAML Plugin creates them, then configure the permissions on the group.\nKnow that the plugin will take the name of the group and camel case (refer to: "),a("code",[t._v("\\craft\\helpers\\StringHelper::camelCase")]),t._v(")\nthe name before saving it (or look up).")]),t._v(" "),a("li",[t._v("Let the plugin create the groups, then add the needed permissions")]),t._v(" "),a("li",[t._v("Use an event! See the "),a("RouterLink",{attrs:{to:"/configure/events.html#assign-user-to-a-user-group-based-on-a-property"}},[t._v("EVENT_AFTER_RESPONSE_TO_USER")]),t._v(" example.")],1)])])}),[],!1,null,null,null);e.default=n.exports}}]);