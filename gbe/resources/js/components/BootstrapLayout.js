import React from 'react';

var BootstrapLayout = React.createClass({

    getInitialState: function() {
        return {
            components:{}
        };
    },

    renderComponent: function (component, index) {
        var comp = this.props.reactComponents[component.componentName];
        return React.createElement(comp, {key:index, data:component.data});
    },

    buildColumn: function (column, index) {
        var clist = [];
        if (column.id in this.props.components) {
            clist = this.props.components[column.id];
        }
        return (
                <div id={column.id} key={column.id} className={column.class}>
                    <b>Layout cell: {column.id}</b>
                    {clist.map(this.renderComponent)}
                </div>
        );
    },

    buildRow: function (row, index) {
        return (
          <div key={"row_" + index} className="row">
              { row.columns.map(this.buildColumn) }
          </div>
      );
    },

    render: function() {
        if (this.props.layout == null) {
            return <div key="bootstrapLayout" >Nothing</div>
        }
        else {
            return (
                <div key="bootstrapLayout">
                    <h1> Page Title </h1>

                    {this.props.layout.rows.map(this.buildRow)}

                </div>
            );
        }
    }
});

export default BootstrapLayout;




