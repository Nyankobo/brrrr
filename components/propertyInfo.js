'use strict';

const e = React.createElement;

class LikeButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = { liked: false };
  }

  render() {
    if (this.state.liked) {
      return 'You liked this.';
    }

    return e(
      'button',
      { onClick: () => this.setState({ liked: true }) },
      'Like'
    );
  }
}

class ReportTitle extends React.Component {
    constructor(props) {
      super(props);
    }
  
    render() {
  
      return e(
        'div', {
            className: "text-center"
        },
        this.props.reportTitle ?? 'test'
      );
    }
  }

const domContainer = document.querySelector('#root');
ReactDOM.render(e(ReportTitle), domContainer);