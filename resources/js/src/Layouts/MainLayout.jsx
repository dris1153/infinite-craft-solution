import React from "react";
import { cn } from "@/helpers/base";
import GlobalProvider from "../Contexts/GlobalProvider";

const MainLayout = ({ children }) => {
    return (
        <GlobalProvider>
            <div className="h-[100svh] flex flex-col overflow-hidden">
                <div className={cn("main-layout overflow-hidden")}>
                    {children}
                </div>
            </div>
        </GlobalProvider>
    );
};

export default MainLayout;
