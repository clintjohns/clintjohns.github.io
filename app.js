import React from 'react';
import ReactDOM from 'react-dom'

class test extends React.Component {
	render()
	{
		return <h1>Hello World</h1>;
	}

}

ReactDOM.render(<test />,document.getElementById("app"));