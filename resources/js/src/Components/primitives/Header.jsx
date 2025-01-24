import React from "react";

import { usePage } from "@inertiajs/react";

const Header = ({ positionHeader }) => {
    const user = usePage().props.auth.user;
    return <header></header>;
};

export default Header;
