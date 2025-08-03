import { cn } from '@/Lib/Utils';
import { InputFieldProps } from '@/Types/Inputs';

const InputField = (props: InputFieldProps) => {
    const { className, type, label, coloredLabel, errorMessage, id, helperText, ...rest } = props;
    return (
        <div className="flex w-full flex-col gap-1">
            <div className="flex flex-row gap-2">
                <label className={cn(
                    'text-neutral-800 dark:text-neutral-400',
                    errorMessage && 'text-red-600',
                    className
                )} htmlFor={id}>
                    {label}
                </label>
                <span className={'text-primary'}>{coloredLabel}</span>
            </div>
            <div className="flex flex-row items-center justify-start gap-2">
                <div className="relative w-full">
                    <input
                        ref={rest.ref}
                        type={type}
                        className={cn(
                            "flex w-full",
                            "px-3 py-2",
                            "rounded-md",
                            "border border-neutral-600",
                            "bg-neutral-300/20 dark:bg-neutral-700/20",
                            "text-neutral-800 dark:text-neutral-100",
                            "file:text-neutral-300 placeholder:text-neutral-500",
                            "shadow-sm transition-colors",
                            "file:border-0 file:bg-transparent file:text-sm file:font-medium",
                            "focus-visible:ring-1 focus-visible:outline-none",
                            "disabled:cursor-not-allowed disabled:opacity-70",
                            "text-base md:text-sm",
                            className,
                        )}
                        id={id}
                        {...rest}
                    />
                </div>
            </div>
            <p className={cn(
                'text-base',
                'text-neutral-800 dark:text-neutral-400',
                errorMessage && 'hidden'
            )}>{helperText}</p>
            <p id={`error-${id}`} className={cn('text-[0.8rem] font-medium text-red-600', className)}>
                {errorMessage}
            </p>
        </div>
    );
};
InputField.displayName = 'Input';

export default InputField;
