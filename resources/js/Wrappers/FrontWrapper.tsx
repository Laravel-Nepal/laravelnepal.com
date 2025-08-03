import { LayoutProps } from "@/Types/Types";
import { Head } from "@inertiajs/react";
import { FC } from "react";
import { Bounce, ToastContainer } from "react-toastify";
import {cn} from "@/Lib/Utils";

const FrontWrapper: FC<LayoutProps> = (props) => {
    const { children, title } = props;

    return (
        <>
            <Head title={title} />
            <ToastContainer
                position="bottom-center"
                autoClose={2000}
                hideProgressBar={false}
                newestOnTop={false}
                closeOnClick
                rtl={false}
                pauseOnFocusLoss={false}
                draggable={false}
                pauseOnHover
                theme="dark"
                transition={Bounce}
            />
            <div
                className={cn(
                    "absolute inset-0",
                    "[background-size:60px_60px]",
                    "[background-image:linear-gradient(to_right,#f1f1f1_1px,transparent_1px),linear-gradient(to_bottom,#f1f1f1_1px,transparent_1px)]",
                    "dark:[background-image:linear-gradient(to_right,#181818_1px,transparent_1px),linear-gradient(to_bottom,#181818_1px,transparent_1px)]",
                )}
            />
            <p className="relative z-20 bg-gradient-to-b from-neutral-200 to-neutral-500 bg-clip-text text-4xl font-bold text-transparent sm:text-7xl">
                {children}
            </p>
        </>
    );
};

export default FrontWrapper;
