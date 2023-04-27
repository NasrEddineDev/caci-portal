export default function Calendar() {
    return (

        <div className="container-fluid">
            <div className="row">
                <div className="col-md-12">
                    <div className="card">
                        <div className="">
                            <div className="row">
                                <div className="col-lg-3 border-right pr-0">
                                    <div className="card-body border-bottom">
                                        <h4 className="card-title mt-2">Drag & Drop Event</h4>
                                    </div>
                                    <div className="card-body">
                                        <div className="row">
                                            <div className="col-md-12">
                                                <div id="calendar-events" className="">
                                                    <div className="calendar-events mb-3" data-class="bg-info"><i
                                                        className="fa fa-circle text-info mr-2"></i>Event One</div>
                                                    <div className="calendar-events mb-3" data-class="bg-success"><i
                                                        className="fa fa-circle text-success mr-2"></i> Event Two
                                                    </div>
                                                    <div className="calendar-events mb-3" data-class="bg-danger"><i
                                                        className="fa fa-circle text-danger mr-2"></i>Event Three
                                                    </div>
                                                    <div className="calendar-events mb-3" data-class="bg-warning"><i
                                                        className="fa fa-circle text-warning mr-2"></i>Event Four
                                                    </div>
                                                </div>
                                                {/* <!-- checkbox --> */}
                                                <div className="custom-control custom-checkbox">
                                                    <input type="checkbox" className="custom-control-input"
                                                        id="drop-remove" />
                                                        <label className="custom-control-label" htmlFor="drop-remove">Remove
                                                            after drop</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-9">
                                    <div className="card-body b-l calender-sidebar">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}
