class RedirectMappingsItem extends React.Component {
    constructor(props) {
        super(props);

        this.index = props.i;

        this.state = {
            ID: props.data.ID,
            FROM: props.data.FROM,
            TO: props.data.TO,
        }

        this.parent = props.parent;

        this.handleChangeFROM = this.handleChangeFROM.bind(this);
        this.handleChangeTO = this.handleChangeTO.bind(this);
    }

    handleChangeFROM(event) {
        this.setState({FROM: $(event.target).val()});
    }

    handleChangeTO(event) {
        this.setState({TO: $(event.target).val()});
    }

    render() {
        return (
            <tr class="redirect_mapping_table_add">
                <input type="hIDden" name="ID[]" value={this.state.ID}/>
                <td>
                    <input type="text" name="FROM[]" value={this.state.FROM} onChange={this.handleChangeFROM}
                           placeholder="Откуда"/>
                </td>
                <td>
                    <input type="text" name="TO[]" value={this.state.TO} onChange={this.handleChangeTO}
                           placeholder="Куда"/>
                </td>
                <td>
                    <button data-id={this.state.ID} data-index={this.index} onClick={this.parent.deleteRow} type="button" class="delete">x</button>
                </td>
            </tr>
        )
    }

}

class RedirectMappings extends React.Component {
    constructor(props) {
        super(props)

        this.delete = [];

        this.data = redirect_data;
        var emptyRow = {
            ID: -1,
            FROM: "",
            TO: "",
        }

        this.data.push(emptyRow);
        this.state = {
            data: this.data,
            toDelete: JSON.stringify(this.delete),
        }

        this.addNewRow = this.addNewRow.bind(this);
        this.deleteRow = this.deleteRow.bind(this);
    }

    addNewRow(event) {
        var emptyRow = {
            ID: -1,
            FROM: "",
            TO: "",
        }

        console.log(this.data);

        this.data.push(emptyRow);

        this.setState({
            data: this.data
        });

    }

    deleteRow(event) {
        var index = $(event.target).data("index");

        delete this.data[index];

        this.delete.push($(event.target).data("id"));

        this.setState({
            data: this.data,
            toDelete: JSON.stringify(this.delete),
        });
    }

    render() {
        return (
            <form action="" method="POST">
                <input type="hidden" name="DELETE" value={this.state.toDelete}/>

                <table class="redirect_mapping_table">
                    <thead>
                    <tr>
                        <th>Отдкуда</th>
                        <th>Куда</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>

                    {this.state.data.map((data, i) => <RedirectMappingsItem parent={this} i={i} key={i} data={data}/>)}

                    <tr>
                        <td colSpan="3">
                            <button onClick={this.addNewRow} type="button" class="add_new_row">Добавить</button>
                        </td>
                    </tr>

                    <tr class="butTOns">
                        <td colSpan="3">
                            <button type="submit" name="ACTION" value="SAVE">Сохранить</button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </form>
        )
    }
}

ReactDOM.render(<RedirectMappings/>, $("#RedirectMappings").get(0));